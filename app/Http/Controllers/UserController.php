<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Session;

class UserController extends Controller
{

    // Ubah Password
    public function ubah_password()
    {
        return view('auth.ubah-password');
    }

    public function ubah_password_update(Request $request)
    {
        $current = $request->currentpassword;
        $new = $request->newpassword;
        $confirm = $request->confirmpassword;

        if (password_verify($current, auth()->user()->password)) {
            if ($new == $confirm) {
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

        return redirect()->route('password.change');
    }
}
