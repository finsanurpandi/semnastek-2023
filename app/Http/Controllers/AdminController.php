<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Article;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // public function index()
    // {
    //     return view('admin.home');
    // }

    public function registered_user()
    {
        $data['users'] = User::where('role_id', 4)->get();

        return view('admin.registered-user')->with($data);
    }

    public function article()
    {
        $data['articles'] = Article::with(['user','authors', 'scope', 'manuscript', 'submission'])->get();

        return view('admin.article')->with($data);
    }

    public function download($file)
    {
        $file = Crypt::decryptString($file);
        return Storage::download($file);
    }
}
