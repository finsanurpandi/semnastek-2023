<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Article;
use App\Models\Setting;
use Session;

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

    public function setting()
    {
        $data['setting'] = Setting::find(1);

        return view('admin.setting')->with($data);
    }

    public function due_date_update(Request $request)
    {
        Setting::where('id', 1)
                ->update([
                    'due_date' => $request->duedate
                ]);

        Session::flash('status', 'Due Date berhasil diupdate');

        return redirect()->back();
    }

    public function payment_update(Request $request)
    {
        $state = Setting::find(1);

        if($state->payment == 1)
        {
            Setting::where('id', 1)
                ->update([
                    'payment' => false
            ]);
        } else {
            Setting::where('id', 1)
                ->update([
                    'payment' => true
            ]);
        }

        Session::flash('status', 'Menu Payment berhasil diupdate');

        return redirect()->back();
    }

    public function reset_password(Request $request)
    {
        // dd($request->id);
        User::where('id', $request->id)->update(['password' => Hash::make('12345678')]);
        Session::flash('status', 'Password telah berhasil diatur ulang');

        return redirect()->back();
    }

    public function force_submit(Request $request)
    {
        try {
            DB::table('articles')->where('id', $request->id)->update(['submitted_at' => now()]);

            DB::table('article_submission')->insert([
                'article_id' => $request->id,
                'submission_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ]);

            Session::flash('status', 'Force submit berhasil!!!');
        } catch (Throwable $e) {
            report($e);

            return false;
        }

        return redirect()->back();
    }
}
