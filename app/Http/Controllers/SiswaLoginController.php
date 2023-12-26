<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Murid;
use App\Models\User;
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
    
        $murid = Murid::where('nama_murid', $credentials['userName'])->first();
    
        if ($murid) {
            Auth::guard('siswa')->login($murid);
            return redirect()->intended('/profilsiswa');
        }
    
        // Jika otentikasi gagal
        return redirect()->back()->withInput($request->only('userName','password'))->with('error', 'Invalid Username or password');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}

