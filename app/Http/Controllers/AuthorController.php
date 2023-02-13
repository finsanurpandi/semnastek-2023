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
use App\Models\User;
use Session;


class AuthorController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        $data['articles'] = Article::where('user_id', auth()->user()->id)->get();
        return view('author.article')->with($data);
    }

    public function show($id)
    {
        // $data['status'] = DB::table('articles')
        //                     ->leftJoin('article_submission_statuses', 'article_submission_statuses.article_id', '=', 'articles.id')
        //                     ->leftJoin('submission_statuses', 'submission_statuses.id', '=', 'article_submission_statuses.submission_status_id')
        //                     ->where('articles.id',$id)
        //                     ->select('articles.id', 'article_submission_statuses.*', 'submission_statuses.name')
        //                     ->orderBy('article_submission_statuses.id', 'DESC')
        //                     ->first();

        $data['status'] = DB::table('article_submission_statuses')
                            ->leftJoin('articles', 'article_submission_statuses.article_id', '=', 'articles.id')
                            ->leftJoin('submission_statuses', 'submission_statuses.id', '=', 'article_submission_statuses.submission_status_id')
                            ->where('articles.id',$id)
                            ->select('articles.id', 'article_submission_statuses.*', 'submission_statuses.name')
                            ->orderBy('article_submission_statuses.id', 'DESC')
                            ->first();
        $data['article'] = Article::where('id', $id)->with(['authors', 'scope', 'manuscript'])->first();
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

            DB::table('article_submission_statuses')->insert([
                'article_id' => $id,
                'submission_status_id' => 1,
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

        if($manuscript !== null)
        {
            Storage::delete('public/'.$manuscript->file);
            Manuscript::destroy($manuscript->id);
        }

        Article::destroy($id);

        Session::flash('status', 'Hapus data berhasil!!!');
        return redirect()->back();
    }

// AUTHOR
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
            return $order+1;
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
                $filename = 'manuscript_'.$request->article_id.'_'.time().'.'.$extension;
                $request->file('file')->storeAs(
                    'public', $filename );
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

    public function manuscript_delete($id)
    {
        $manuscript = Manuscript::findOrFail($id);
        Storage::delete('public/'.$manuscript->file);
        Manuscript::destroy($id);

        Session::flash('status', 'Hapus data berhasil!!!');
        return redirect()->back();
    }

    // Ubah Password
    public function ubah_password()
    {
        return view('author.ubah-password');
    }

    public function ubah_password_update(Request $request)
    {
        $current = $request->currentpassword;
        $new = $request->newpassword;
        $confirm = $request->confirmpassword;


        if (password_verify($current, auth()->user()->password)) {
            if($new == $confirm)
            {
                $validated = $request->validate([
                    'newpassword' => 'min:8',
                ]);

                $user = User::findOrFail(auth()->user()->id);
                $user->update([
                    'password' => Hash::make($new),
                ]);
                Session::flash('status', 'Password berhasil diubah!!!');
            } else {
                Session::flash('failed', 'Konfirmasi password salah!');
            }
            
        } else {
            Session::flash('failed', 'Password salah!');
        }

        return redirect()->route('home');
    }

    // AJAX
    public function getDataScope($id)
    {
        $scopes = Scope::where('department_id', $id)->get();

        return response()->json($scopes);
    }
}
