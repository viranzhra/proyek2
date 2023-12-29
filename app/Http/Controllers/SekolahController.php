<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sekolah;

class SekolahController extends Controller
{
    public function showIdentitasSekolah()
    {
        $sekolah = Sekolah::first(); // Mendapatkan data identitas sekolah dari database

        return view('admin/profil_sekolah/identitas', compact('sekolah'));
    }

    public function index()
    {
        $sekolah = Sekolah::first();
        return view('landingpage', compact('sekolah'));
    }

    public function edit()
    {
        $sekolah = Sekolah::first();
        return view('sekolah.edit', compact('sekolah'));
    }

    public function update(Request $request)
    {
        $sekolah = Sekolah::first();
        $sekolah->update($request->all());

        return redirect()->route('identitas-sekolah')
            ->with('success', 'Data sekolah berhasil diupdate.');
    }
}
