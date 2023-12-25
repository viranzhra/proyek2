<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiswaLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login_siswa');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('userName', 'password');

        if (Auth::attempt($credentials)) {
            // Jika autentikasi berhasil
            return redirect()->intended('/profilsiswa'); // Ganti '/dashboard' dengan halaman setelah login
        }

        // Jika autentikasi gagal
        return redirect()->back()->withInput($request->only('userName'))->withErrors([
            'userName' => 'Invalid credentials',
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}

