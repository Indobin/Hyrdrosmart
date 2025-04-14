<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function postLogin(Request $request)
    {
        $request->validate([
            'username' => 'required|min:3|max:200',
            'password' => 'required|min:8',
        ],[
            'username.required' => 'Nama wajib diisi!',
            'username.min' => 'Nama tidak boleh kurang dari 3 karakter!',
            'username.max' => 'Nama tidak boleh melebihi 200 karakter!',
            'password.required' => 'Password wajib diisi!',
            'password.min' => 'Password minimal 8 karakter!',
        ]
        );
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                        ->withSuccess('Anda berhasil login');
        }
        return redirect("/")->with('error','Username atau password salah!');
    }
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
