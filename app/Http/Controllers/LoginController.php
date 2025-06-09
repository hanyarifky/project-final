<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate(
            [
                'username' => ['required', 'string'],
                'password' => ['required']
            ],
            [
                'username.required' => "Harap masukkan usernmae",
                'username.string' => "Masukkan username yang benar!",
                'password.required' => "Harap masukkan password"
            ]
        );

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            alert()->success('Success', 'Login Berhasil');

            return redirect()->intended('');
        }

        alert()->error('Login Gagal', 'Username atau Password Salah');

        return back();
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('login');
    }
}
