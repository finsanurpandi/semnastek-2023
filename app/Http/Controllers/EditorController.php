<?php

namespace App\Http\Controllers;

use App\Exports\ArticlesExport;
use App\Http\Requests\StoreReviewerRequest;
use App\Models\Article;
use App\Models\ArticleReview;
use App\Models\BlindManuscript;
use App\Models\Reviewer;
use App\Models\Revision;
use App\Models\RevisionEditor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Database\Query\JoinClause;

class EditorController extends Controller
{
    public function __construct()
    {
        // $this->middleware(['auth', 'verified']);
        $this->middleware('auth');
    }

    public function index()
    {
        $reviewers = Reviewer::all();
        return view('editor.reviewer', compact('reviewers'));
    }

    public function show($id)
    {
        $data['status'] = DB::table('article_submission')
            ->leftJoin('articles', 'article_submission.article_id', '=', 'articles.id')
            ->leftJoin('submission_statuses', 'submission_statuses.id', '=', 'article_submission.submission_id')
            ->where('articles.id', $id)
            ->select('articles.id', 'article_submission.*', 'submission_statuses.name')
            ->orderBy('article_submission.id', 'DESC')
            ->first();

        $data['review_status'] = DB::table('articles')
            ->leftJoin('article_review', 'articles.id', '=', 'article_review.article_id')
            ->leftJoin('review_statuses', 'review_statuses.id', '=', 'article_review.review_id')
            ->where('articles.id', $id)
            ->select('articles.id', 'article_review.review_id', 'review_statuses.name')
            ->orderBy('article_review.id', 'DESC')
            ->first();

        $data['article'] = Article::where('id', $id)->with(['authors', 'scope', 'manuscript'])->first();

        return view('article.show')->with($data);
    }

    public function create()
    {
        return view('editor.create');
    }

    public function store(StoreReviewerRequest $request)
    {
        $validated = $request->validated();

        try {
            $reviewer = DB::table('reviewers')->insertGetId([
                'fullname' => $validated['fullname'],
                'email' => $validated['email'],
            ]);

            $user = DB::table('users')->insert([
                'name' => $validated['fullname'],
                'email' => $validated['email'],
                'password' => bcrypt('12345'),
                'role_id' => 3,
            ]);
        } catch (Throwable $e) {
            report($e);
            return false;
        }

        Session::flash('status', 'Input data berhasil!!!');
        return redirect()->route('editor.index');
    }

    public function edit($id)
    {
        $reviewer = Reviewer::findOrFail($id);
        return view('editor.edit', compact('reviewer'));
    }

    public function update(Request $request)
    {

        try {
            $reviewer = Reviewer::findOrFail($request->id);
            $reviewer->update($request->all());
            DB::table('users')
                ->where('email', $request->email)
                ->update(['name' => $request->fullname]);
        } catch (Throwable $e) {
            report($e);

            return false;
        }

        Session::flash('status', 'Ubah data berhasil!!!');
        return redirect()->route('editor.index', $request->id);
    }

    public function destroy($id)
    {
        Reviewer::destroy($id);

        Session::flash('status', 'Hapus data berhasil!!!');
        return redirect()->back();
    }

    public function article_list()
    {
        $scopes = DB::table('scopes')->get();
        $departments = DB::table('departments')->get();

        $articles = DB::table('articles')
            ->leftJoin('blind_manuscripts', 'articles.id', '=', 'blind_manuscripts.article_id')
            ->leftJoin('article_review', 'articles.id', '=', 'article_review.article_id')
            ->leftJoin('article_submission', 'articles.id', '=', 'article_submission.article_id')
            ->leftJoin('reviewers', 'blind_manuscripts.reviewer_id', '=', 'reviewers.id')
            ->leftJoin('manuscripts', 'articles.id', '=', 'manuscripts.article_id')
            ->leftJoin('revisions', 'articles.id', '=', 'revisions.article_id')
            ->leftJoin('revision_editors', 'articles.id', '=', 'revision_editors.article_id')
            ->select(DB::raw('DISTINCT articles.*, blind_manuscripts.article_id, blind_manuscripts.file, blind_manuscripts.reviewer_id, article_review.review_id, article_submission.submission_id, manuscripts.file, revisions.revision_file, revisions.comment, revisions.new_file, reviewers.fullname, revision_editors.new_file as final_paper'))
            ->whereNotNull('submitted_at')
            ->orderBy('id', 'DESC')
            ->get();

        

        

        return view('article.list-article', compact('articles', 'departments', 'scopes'));
    }

    public function article_detail($article_id, $action)
    {
        $data['status'] = DB::table('article_submission')
            ->leftJoin('articles', 'article_submission.article_id', '=', 'articles.id')
            ->leftJoin('submission_statuses', 'submission_statuses.id', '=', 'article_submission.submission_id')
            ->where('articles.id', $article_id)
            ->select('articles.id', 'article_submission.*', 'submission_statuses.name')
            ->orderBy('article_submission.id', 'DESC')
            ->first();

        $data['review_status'] = DB::table('articles')
            ->leftJoin('article_review', 'articles.id', '=', 'article_review.article_id')
            ->leftJoin('review_statuses', 'review_statuses.id', '=', 'article_review.review_id')
            ->where('articles.id', $article_id)
            ->select('articles.id', 'article_review.review_id', 'review_statuses.name')
            ->orderBy('article_review.id', 'DESC')
            ->first();

        $data['article'] = Article::where('id', $article_id)->with(['authors', 'scope', 'manuscript'])->first();
        $data['reviewer'] = Reviewer::all();
        $data['blind_manuscripts'] = BlindManuscript::where('article_id', $article_id)->first();
        $data['action'] = $action;

        return view('article.show')->with($data);
    }

    public function blind_manuscript_store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:docx,doc|max:5120',
            'reviewer_id' => 'required',
        ]);

        try {
            $manuscript = new BlindManuscript;

            $manuscript->article_id = $request->article_id;
            $manuscript->reviewer_id = $request->reviewer_id;
            $manuscript->created_at = Carbon::now();
            $manuscript->updated_at = Carbon::now();

            if ($request->hasFile('file')) {
                $extension = $request->file('file')->extension();
                $filename = 'blind_manuscript_' . $request->article_id . '_' . time() . '.' . $extension;
                $request->file('file')->storeAs(
                    'public/blind_manuscript',
                    $filename
                );
                $manuscript->file = $filename;
            }

            try {
                DB::table('article_submission')
                    ->where('article_id', $request->article_id)
                    ->update(['submission_id' => 2]);
            } catch (Throwable $th) {
                report($e);

                return false;
            }

            $manuscript->save();
            Session::flash('status', 'Input data berhasil!!!');
        } catch (Throwable $e) {
            report($e);

            return false;
        }

        return redirect()->route('editor.article', $request->article_id);
    }

    public function blind_manuscript_edit(Request $request)
    {
        $request->validate([
            'file' => 'nullable|mimes:docx,doc|max:5120',
            'reviewer_id' => 'required',
        ]);

        try {
            $manuscript = BlindManuscript::where('article_id', $request->article_id)->first();
            $manuscript->reviewer_id = $request->reviewer_id;
            $manuscript->updated_at = Carbon::now();

            if ($request->hasFile('file')) {
                Storage::delete('public/blind_manuscript/' . $manuscript->file);
                $extension = $request->file('file')->extension();
                $filename = 'blind_manuscript_' . $manuscript->article_id . '_' . time() . '.' . $extension;
                $request->file('file')->storeAs(
                    'public/blind_manuscript',
                    $filename
                );
                $manuscript->file = $filename;
            }

            $manuscript->save();

            Session::flash('status', 'Update data berhasil!!!');
        } catch (Throwable $e) {
            report($e);
            return false;
        }

        return redirect()->route('editor.article', $manuscript->article_id);
    }

    public function approved($id)
    {
        try {
            DB::table('article_submission')
                ->where('article_id', $id)
                ->update(['submission_id' => 2]);
            DB::table('article_review')
                ->where('article_id', $id)
                ->update(['review_id' => 1]);
        } catch (Throwable $th) {
            report($e);

            return false;
        }

        Session::flash('status', 'Artikel berhasil disetujui!!!');
        return redirect()->route('editor.article');
    }

    public function rejected($id)
    {
        try {
            DB::table('article_submission')
                ->where('article_id', $id)
                ->update(['submission_id' => 5]);
            DB::table('article_review')
                ->where('article_id', $id)
                ->update(['review_id' => 4]);
        } catch (Throwable $th) {
            report($e);

            return false;
        }

        Session::flash('status', 'Artikel telah ditolak!!!');
        return redirect()->route('editor.article');
    }

    public function revised_result($id)
    {
        $articles = Revision::where('article_id', $id)->get();
        if (count($articles) > 0) {
            return view('article.revise-article-result', compact('id', 'articles'));
        } else {
            return redirect()->route('editor.manuscript.revised', ['id' => $id]);
        }
    }

    public function manuscript_revised($id)
    {
        $data['article'] = Article::findOrFail($id);
        $data['action'] = 'editor';
        return view('article.upload-manuscript-revised')->with($data);
    }

    public function revised(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:docx,doc|max:5120',
        ]);

        try {
            $revise = new RevisionEditor;

            $revise->article_id = $request->article_id;
            $revise->comment = $request->comment;
            $revise->created_at = Carbon::now();
            $revise->updated_at = Carbon::now();

            if ($request->hasFile('file')) {
                $extension = $request->file('file')->extension();
                $filename = 'new_manuscript_' . $request->article_id . '_' . time() . '.' . $extension;
                $request->file('file')->storeAs(
                    'public/revise_manuscript',
                    $filename
                );

                $revise->revision_file = $filename;
            }
            $revise->save();

            try {
                DB::table('article_submission')
                    ->where('article_id', $request->article_id)
                    ->update(['submission_id' => 3]);
                DB::table('article_review')
                    ->where('article_id', $request->article_id)
                    ->update(['review_id' => 2]);
            } catch (Throwable $th) {
                report($e);

                return false;
            }


            Session::flash('status', 'Dokument Terbaru berhasi ditambahkan data berhasil!!!');
        } catch (Throwable $e) {
            report($e);

            return false;
        }

        return redirect()->route('editor.article', $request->article_id);
    }

    public function export()
    {
        $fileName = 'articles-' . date('Y-m-d') . '.xlsx';
        return Excel::download(new ArticlesExport, $fileName);
    }
}
