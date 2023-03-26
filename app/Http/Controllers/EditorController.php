<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReviewerRequest;
use App\Models\Article;
use App\Models\BlindManuscript;
use App\Models\Reviewer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

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
        $data['status'] = DB::table('article_submission_statuses')
            ->leftJoin('articles', 'article_submission_statuses.article_id', '=', 'articles.id')
            ->leftJoin('submission_statuses', 'submission_statuses.id', '=', 'article_submission_statuses.submission_status_id')
            ->where('articles.id', $id)
            ->select('articles.id', 'article_submission_statuses.*', 'submission_statuses.name')
            ->orderBy('article_submission_statuses.id', 'DESC')
            ->first();
        $data['article'] = Article::where('id', $id)->with(['authors', 'scope', 'manuscript'])->first();

        // dd($data['article']);
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
                // 'created_at' => Carbon::now(),
                // 'updated_at' => Carbon::now(),
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
        } catch (Throwable $e) {
            report($e);

            return false;
        }

        Session::flash('status', 'Ubah data berhasil!!!');
        return redirect()->route('editor.index', $request->id);
    }

    public function submit($id)
    {
    }

    public function destroy($id)
    {
        Reviewer::destroy($id);

        Session::flash('status', 'Hapus data berhasil!!!');
        return redirect()->back();
    }

    public function article_list()
    {
        $articles = DB::table('articles')
            ->leftJoin('blind_manuscripts', 'articles.id', '=', 'blind_manuscripts.article_id')
            ->leftJoin('reviewers', 'blind_manuscripts.reviewer_id', '=', 'reviewers.id')
            ->leftJoin('manuscripts', 'articles.id', '=', 'manuscripts.article_id')
            ->select('*')
            ->whereNotNull('submitted_at')
            ->get();

        return view('article.list-article', compact('articles'));
    }

    public function article_detail($article_id, $action)
    {
        $data['status'] = DB::table('article_submission_statuses')
            ->leftJoin('articles', 'article_submission_statuses.article_id', '=', 'articles.id')
            ->leftJoin('submission_statuses', 'submission_statuses.id', '=', 'article_submission_statuses.submission_status_id')
            ->where('articles.id', $article_id)
            ->select('articles.id', 'article_submission_statuses.*', 'submission_statuses.name')
            ->orderBy('article_submission_statuses.id', 'DESC')
            ->first();
        $data['article'] = Article::where('id', $article_id)->with(['authors', 'scope', 'manuscript'])->first();
        $data['reviewer'] = Reviewer::all();
        $data['blind_manuscripts'] = BlindManuscript::where('article_id', $article_id)->first();
        $data['action'] = $action;

        // dd($data['blind_manuscripts']);

        return view('article.show')->with($data);
    }

    public function blind_manuscript_store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:docx,doc|max:5120',
            'reviewer_id' => 'required',
        ]);

        try {
            // Author::create($request->all());
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
                DB::table('article_submission_statuses')
                    ->where('article_id', $request->article_id)
                    ->update(['submission_status_id' => 2]);
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
}
