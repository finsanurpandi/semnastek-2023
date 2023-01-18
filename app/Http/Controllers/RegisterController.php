<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|unique:users',
            'name' => 'required|max:255',
            'password' => 'required',
            'address' => 'required',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        //set auto jadi participant
        $validatedData['roles_id'] = 4;

        User::create($validatedData);

        return redirect('/login')->with('success', 'Daftar Berhasil, Silahkan untuk Login!');
    }
}
