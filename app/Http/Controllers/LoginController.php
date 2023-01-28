<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function index()
    {
        return view('auth/login');
    }
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (Auth::user()->roles_id == 1) {
                $role = 'admin';
            } else if (Auth::user()->roles_id == 2) {
                $role = 'keuangan';
            } else if (Auth::user()->roles_id == 3) {
                $role = 'reviewer';
            } else {
                $role = 'participant';
            }

            $alert = array(
                'message' => 'Berhasil Masuk',
                'alert-type' => 'success'
            );

            return redirect()->route($role)->with($alert);
        }

        return back()->with([
            'message' => 'Email atau password anda salah.',
            'alert-type' => 'error'
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/');
    }
}
