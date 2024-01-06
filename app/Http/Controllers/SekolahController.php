<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sekolah;
use Illuminate\Support\Facades\Storage;

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
    
        // Update other fields
        $sekolah->update($request->except('logo'));
    
        // Handle logo update
        if ($request->hasFile('logo')) {
            // Delete existing logo if it exists
            if ($sekolah->logo_path) {
                Storage::delete($sekolah->logo_path);
            }
    
            // Store new logo
            $logoPath = $request->file('logo')->store('images', 'public');
            $sekolah->update(['logo_path' => $logoPath]);
        }
    
        return redirect()->route('identitas-sekolah')
            ->with('success', 'Data sekolah berhasil diupdate.');
    }
}
