<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\StoreAuthorRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Models\Article;
use App\Models\ArticleReview;
use App\Models\Department;
use App\Models\Scope;
use App\Models\Author;
use App\Models\BlindManuscript;
use App\Models\Manuscript;
use App\Models\Revision;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Session;

class ReviewController extends Controller
{
    public function __construct()
    {
        // $this->middleware(['auth', 'verified']);
        $this->middleware('auth');
    }

    public function index()
    {
        // $articles = Article::whereNotNull('submitted_at')->get();

        // get user
        $user = Auth::user();
        // get reviewer
        $reviewer = $user->reviewer;
        // get all blind manuscript by reviewer
        $blindManuscripts = $reviewer->blindManuscripts;

        $articles = $blindManuscripts->map(function ($blindManuscript) {
            return DB::table('articles')
                ->leftJoin('article_submission', 'articles.id', '=', 'article_submission.article_id')
                ->leftJoin('article_review', 'articles.id', '=', 'article_review.article_id')
                ->leftJoin('blind_manuscripts', 'blind_manuscripts.article_id', '=', 'articles.id')
                ->leftJoin('revisions', 'revisions.article_id', '=', 'articles.id')
                ->where('blind_manuscripts.id', '=', $blindManuscript->id)
                ->select('articles.*', 'revisions.revision_file', 'article_submission.submission_id', 'article_review.review_id', 'blind_manuscripts.file')
                ->first();
        });
        return view('article.list-article', compact('articles'));
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

        // dd($data['review_status']);
        return view('article.show')->with($data);
    }

    public function approved($id)
    {

        try {
            DB::table('article_submission')
                ->where('article_id', $id)
                ->update(['submission_id' => 2]);

            $status = new ArticleReview;

            $status->article_id = $id;
            $status->review_id = 5;
            $status->created_at = Carbon::now();
            $status->updated_at = Carbon::now();

            $status->save();
        } catch (Throwable $th) {
            report($e);

            return false;
        }

        Session::flash('status', 'Artikel berhasil disetujui!!!');
        return redirect()->route('reviewer.index');
    }

    public function rejected($id)
    {

        try {
            DB::table('article_submission')
                ->where('article_id', $id)
                ->update(['submission_id' => 2]);

            $status = new ArticleReview;

            $status->article_id = $id;
            $status->review_id = 6;
            $status->created_at = Carbon::now();
            $status->updated_at = Carbon::now();

            $status->save();
        } catch (Throwable $th) {
            report($e);

            return false;
        }

        Session::flash('status', 'Artikel telah ditolak!!!');
        return redirect()->route('reviewer.index');
    }
    public function revised_form($id)
    {
        return view('reviewer.revise-article', compact('id'));
    }
    public function next_revised_form($id)
    {
        return view('reviewer.next-revise-article', compact('id'));
    }

    public function revised(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:docx,doc|max:5120',
            'comment' => 'required',
        ]);

        try {
            // Author::create($request->all());
            $revise = new Revision;

            $revise->article_id = $request->article_id;
            $revise->comment = $request->comment;
            $revise->created_at = Carbon::now();
            $revise->updated_at = Carbon::now();

            if ($request->hasFile('file')) {
                $extension = $request->file('file')->extension();
                $filename = 'revise_manuscript_' . $request->article_id . '_' . time() . '.' . $extension;
                $request->file('file')->storeAs(
                    'public/revise_manuscript',
                    $filename
                );
                $revise->revision_file = $filename;
            }

            $revise->save();
            Session::flash('status', 'Revisi berhasil diberikan!!!');
        } catch (Throwable $e) {
            report($e);

            return false;
        }


        return redirect()->route('reviewer.index');
    }
    public function next_revision(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:docx,doc|max:5120',
            'comment' => 'required',
        ]);

        try {
            // Author::create($request->all());
            $revise = new Revision;

            $revise->article_id = $request->article_id;
            $revise->comment = $request->comment;
            $revise->created_at = Carbon::now();
            $revise->updated_at = Carbon::now();

            if ($request->hasFile('file')) {
                $extension = $request->file('file')->extension();
                $filename = 'revise_manuscript_' . $request->article_id . '_' . time() . '.' . $extension;
                $request->file('file')->storeAs(
                    'public/revise_manuscript',
                    $filename
                );
                $revise->revision_file = $filename;
            }

            try {
                DB::table('article_submission')
                    ->where('article_id', $request->article_id)
                    ->update(['submission_id' => 3]);
                DB::table('article_review')
                    ->where('article_id', $request->article_id)
                    ->update(['review_id' => 2, 'updated_at' => Carbon::now()]);
            } catch (Throwable $th) {
                report($e);

                return false;
            }

            $revise->save();
            Session::flash('status', 'Revisi berhasil diberikan!!!');
        } catch (Throwable $e) {
            report($e);

            return false;
        }


        return redirect()->route('reviewer.index');
    }

    public function revised_result($id)
    {
        $articles = Revision::where('article_id', $id)->get();
        return view('article.revise-article-result', compact('id', 'articles'));
    }
}
