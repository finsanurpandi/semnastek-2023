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
use App\Models\Department;
use App\Models\Scope;
use App\Models\Author;
use App\Models\Manuscript;
use App\Models\Payment;
use App\Models\Revision;
use App\Models\User;
use Session;


class AuthorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // $data['articles'] = Article::where('user_id', auth()->user()->id)->get();
        $data['articles'] = DB::table('articles')
            ->leftJoin('article_submission', 'articles.id', '=', 'article_submission.article_id')
            ->leftJoin('payments', 'articles.id', '=', 'payments.articles_id')
            ->where('articles.user_id', auth()->user()->id)
            ->select('articles.*', 'payments.payment_file', 'article_submission.article_id', 'article_submission.submission_id')->get();

        // dd($data['articles']);
        return view('author.article')->with($data);
    }

    public function show($id)
    {
        // $data['status'] = DB::table('articles')
        //                     ->leftJoin('article_submission', 'article_submission.article_id', '=', 'articles.id')
        //                     ->leftJoin('submission_statuses', 'submission_statuses.id', '=', 'article_submission.submission_id')
        //                     ->where('articles.id',$id)
        //                     ->select('articles.id', 'article_submission.*', 'submission_statuses.name')
        //                     ->orderBy('article_submission.id', 'DESC')
        //                     ->first();

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

        // dd($data['status']);
        // dd($data['review_status']);
        return view('author.show')->with($data);
    }

    public function create()
    {
        $data['departments'] = Department::pluck('name', 'id');
        return view('author.create')->with($data);
    }

    public function generate_id()
    {
        $id = time();
        $user = Article::where('id', $id)->first();

        if ($user) {
            $this->generate_id();
        } else {
            return $id;
        }
    }

    public function store(StoreArticleRequest $request)
    {
        // $article = Article::create($request->validated());
        $validated = $request->validated();

        try {
            $article = DB::table('articles')->insertGetId([
                'id' => $this->generate_id(),
                'user_id' => $validated['user_id'],
                'scope_id' => $validated['scope_id'],
                'title' => $validated['title'],
                'abstract' => $validated['abstract'],
                'keywords' => $validated['keywords'],
                'corresponding_email' => $validated['corresponding_email'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        } catch (Throwable $e) {
            report($e);

            return false;
        }

        Session::flash('status', 'Input data berhasil!!!');
        return redirect()->route('author.show', $article);
    }

    public function edit($id)
    {
        $data['article'] = Article::findOrFail($id);
        $data['departments'] = Department::pluck('name', 'id');
        $data['scope'] = Scope::where('id', $data['article']->scope_id)->first();
        return view('author.edit')->with($data);
    }

    public function update(Request $request)
    {

        try {
            $article = Article::findOrFail($request->id);
            $article->update($request->all());
        } catch (Throwable $e) {
            report($e);

            return false;
        }

        Session::flash('status', 'Ubah data berhasil!!!');
        return redirect()->route('author.show', $request->id);
    }

    public function submit($id)
    {

        try {
            // $article = Article::findOrFail($id);
            // $article->update([
            //     'submitted_at' => Carbon::now()
            // ]);
            DB::table('articles')->where('id', $id)->update(['submitted_at' => Carbon::now()]);

            DB::table('article_submission')->insert([
                'article_id' => $id,
                'submission_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);

            Session::flash('status', 'Ubah data berhasil!!!');
        } catch (Throwable $e) {
            report($e);

            return false;
        }

        return redirect()->route('author.index');
    }

    public function destroy($id)
    {
        $manuscript = Manuscript::where('article_id', $id)->first();

        if ($manuscript !== null) {
            Storage::delete('public/manuscript/' . $manuscript->file);
            Manuscript::destroy($manuscript->id);
        }

        Article::destroy($id);

        Session::flash('status', 'Hapus data berhasil!!!');
        return redirect()->back();
    }

    public function setdraft($id)
    {
        Article::where('id', $id)
            ->update([
                'submitted_at' => null
            ]);

        DB::table('article_submission')->where('article_id', $id)->delete();
        Session::flash('status', 'Perubahan status menjadi draft berhasil!!!');
        return redirect()->back();
    }

    // AUTHOR

    public function revised_result($id)
    {
        $articles = Revision::where('article_id', $id)->get();

        return view('reviewer.revise-article-result', compact('id', 'articles'));
    }

    public function author_show($id)
    {
        $data['article'] = Article::findOrFail($id);
        $data['authors'] = Article::findOrFail($id)->authors()->orderBy('order', 'ASC')->get();

        return view('author.author-show')->with($data);
    }

    public function author_add($id)
    {
        $data['article'] = Article::findOrFail($id);
        return view('author.author')->with($data);
    }

    public function getOrder($article_id)
    {
        $author = Author::where('article_id', $article_id)->orderBy('order', 'desc')->first();
        if ($author) {
            $order = $author->order;
            return $order + 1;
        } else {
            return 1;
        }
    }

    public function author_store(StoreAuthorRequest $request)
    {
        $validated = $request->validated();

        try {
            // Author::create($request->all());
            DB::table('authors')->insert([
                'article_id' => $validated['article_id'],
                'firstname' => $validated['firstname'],
                'lastname' => $validated['lastname'],
                'email' => $validated['email'],
                'affiliation' => $validated['affiliation'],
                'order' => $this->getOrder($validated['article_id']),
            ]);
        } catch (Throwable $e) {
            report($e);

            return false;
        }

        Session::flash('status', 'Input data berhasil!!!');
        return redirect()->route('author.detail', $request->article_id);
    }

    public function author_edit($id)
    {
        $data['author'] = Author::findOrFail($id);
        $data['article'] = Article::findOrFail($data['author']->article_id);

        return view('author.author-edit')->with($data);
    }

    public function author_update(Request $request)
    {
        try {
            $author = Author::findOrFail($request->id);
            $author->update($request->all());
        } catch (Throwable $e) {
            report($e);

            return false;
        }

        Session::flash('status', 'Ubah data berhasil!!!');
        return redirect()->route('author.detail', $request->article_id);
    }

    public function author_delete($id)
    {
        Author::destroy($id);

        Session::flash('status', 'Hapus data berhasil!!!');
        return redirect()->back();
    }

    // UPLOAD MANUSCRIPT
    public function manuscript($id)
    {
        $data['article'] = Article::findOrFail($id);
        return view('author.upload-manuscript')->with($data);
    }
    public function manuscript_revised($id)
    {
        $data['article'] = Article::findOrFail($id);
        return view('author.upload-manuscript-revised')->with($data);
    }

    public function manuscript_store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:docx,doc|max:5120',
        ]);

        try {
            // Author::create($request->all());
            $manuscript = new Manuscript;

            $manuscript->article_id = $request->article_id;
            $manuscript->created_at = Carbon::now();
            $manuscript->updated_at = Carbon::now();

            if ($request->hasFile('file')) {
                $extension = $request->file('file')->extension();
                $filename = 'manuscript_' . $request->article_id . '_' . time() . '.' . $extension;
                $request->file('file')->storeAs(
                    'public/manuscript',
                    $filename
                );
                $manuscript->file = $filename;
            }
            $manuscript->save();

            Session::flash('status', 'Input data berhasil!!!');
        } catch (Throwable $e) {
            report($e);

            return false;
        }

        return redirect()->route('author.show', $request->article_id);
    }

    public function manuscript_store_revised(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:docx,doc|max:5120',
        ]);

        try {

            if ($request->hasFile('file')) {
                $extension = $request->file('file')->extension();
                $filename = 'new_manuscript_' . $request->article_id . '_' . time() . '.' . $extension;
                $request->file('file')->storeAs(
                    'public/result_revise_manuscript',
                    $filename
                );
                DB::table('revisions')
                    ->where('article_id', $request->article_id)
                    ->update(['new_file' => $filename, 'updated_at' => Carbon::now()]);

                DB::table('article_submission')
                    ->where('article_id', $request->article_id)
                    ->update(['submission_id' => 2]);

                DB::table('article_review')
                    ->where('article_id', $request->article_id)
                    ->update(['review_id' => 3]);
            }

            Session::flash('status', 'Dokument Terbaru berhasi ditambahkan data berhasil!!!');
        } catch (Throwable $e) {
            report($e);

            return false;
        }

        return redirect()->route('author.show', $request->article_id);
    }

    public function manuscript_delete($id)
    {
        $manuscript = Manuscript::findOrFail($id);
        Storage::delete('public/manuscript/' . $manuscript->file);
        Manuscript::destroy($id);

        Session::flash('status', 'Hapus data berhasil!!!');
        return redirect()->back();
    }

    public function article_pembayaran()
    {
        $data['articles'] = DB::table('articles')
            ->leftJoin('article_submission', 'articles.id', '=', 'article_submission.article_id')
            ->leftJoin('article_review', 'articles.id', '=', 'article_review.article_id')
            ->leftJoin('payments', 'articles.id', '=', 'payments.articles_id')
            ->where('articles.user_id', auth()->user()->id)
            ->where('article_review.review_id', 1)
            ->select('articles.*', 'payments.payment_file', 'payments.payment_status', 'article_submission.article_id', 'article_submission.submission_id')->get();

        // dd($data['articles']);
        return view('author.konfirmasi-pembayaran')->with($data);
    }
    public function pembayaran($id)
    {
        $data['article'] = Article::findOrFail($id);
        $data['route_link'] = 'store';
        return view('author.pembayaran')->with($data);
    }
    public function pembayaran_reupload_form($id)
    {
        $data['article'] = Article::findOrFail($id);
        $data['route_link'] = 'reupload';
        return view('author.pembayaran')->with($data);
    }
    public function pembayaran_store(Request $request)
    {
        $request->validate([
            'file' => 'required|image',
        ]);

        try {
            // Author::create($request->all());
            $payment = new Payment;

            $payment->articles_id = $request->article_id;
            $payment->payment_status = 1;
            $payment->created_at = Carbon::now();
            $payment->updated_at = Carbon::now();

            if ($request->hasFile('file')) {
                $extension = $request->file('file')->extension();
                $filename = 'payment_' . $request->article_id . '_' . time() . '.' . $extension;
                $request->file('file')->storeAs(
                    'public/payments',
                    $filename
                );
                $payment->payment_file = $filename;
            }
            $payment->save();

            Session::flash('status', 'Input bukti pembayaran berhasil!!!');
        } catch (Throwable $e) {
            report($e);

            return false;
        }

        return redirect()->route('author.show', $request->article_id);
    }

    public function pembayaran_reupload(Request $request)
    {
        $data = Payment::where('articles_id', $request->article_id)->get();
        Storage::delete('public/payments/' . $data[0]->payment_file);

        $request->validate([
            'file' => 'required|image',
        ]);

        try {
            if ($request->hasFile('file')) {
                $extension = $request->file('file')->extension();
                $filename = 'payment_' . $request->article_id . '_' . time() . '.' . $extension;
                $request->file('file')->storeAs(
                    'public/payments',
                    $filename
                );

                DB::table('payments')
                    ->where('articles_id', $request->article_id)
                    ->update(['payment_status' => 1, 'payment_file' => $filename, 'updated_at' => Carbon::now()]);
            }
            Session::flash('status', 'Upload ulang bukti pembayaran berhasil!!!');
        } catch (Throwable $e) {
            report($e);

            return false;
        }

        return redirect()->route('author.show', $request->article_id);
    }

    // AJAX
    public function getDataScope($id)
    {
        $scopes = Scope::where('department_id', $id)->get();

        return response()->json($scopes);
    }
}
