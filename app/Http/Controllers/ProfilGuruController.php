<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfilGuru;
use App\Models\ProfilKepsek;
use Illuminate\Support\Facades\Storage;

class ProfilGuruController extends Controller
{
    public function index()
    {
        $profilKepsek = ProfilKepsek::all();
        $gurus = ProfilGuru::paginate(5);
        return view('admin.profil_guru.index', compact('gurus', 'profilKepsek'));
    }

    public function create()
    {
        return view('admin.profil_guru.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_guru' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'alamat' => 'required|string',
            'foto_guru' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $input = $request->all();

        if ($request->hasFile('foto_guru')) {
            $foto_guru = $request->file('foto_guru');
            $foto_guru_name = time() . '_' . $foto_guru->getClientOriginalName();
            $foto_guru->storeAs('foto_guru', $foto_guru_name, 'public');
            $input['foto_guru'] = $foto_guru_name;
        }

        ProfilGuru::create($input);

        return redirect()->route('profil_guru.index')->with('success', 'Data guru berhasil ditambahkan.');
    }

    public function showGuru()
    {
        $profilKepsek = ProfilKepsek::first();
        $gurus = ProfilGuru::all();
        return view('profilguru', compact('gurus','profilKepsek'));
    }

    public function edit($id)
    {
        $guru = ProfilGuru::findOrFail($id);
        return view('admin.profil_guru.edit', compact('guru'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_guru' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'alamat' => 'required|string',
            'foto_guru' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $guru = ProfilGuru::findOrFail($id);
        $input = $request->all();

        if ($request->hasFile('foto_guru')) {
            // Hapus foto sebelumnya jika ada
            if ($guru->foto_guru) {
                Storage::delete('foto_guru/' . $guru->foto_guru);
            }

            $foto_guru = $request->file('foto_guru');
            $foto_guru_name = time() . '_' . $foto_guru->getClientOriginalName();
            $foto_guru->storeAs('foto_guru', $foto_guru_name, 'public');
            $input['foto_guru'] = $foto_guru_name;
        }

        $guru->update($input);

        return redirect()->route('profil_guru.index')->with('success', 'Data guru berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $guru = ProfilGuru::findOrFail($id);

        // Hapus foto jika ada
        if ($guru->foto_guru) {
            Storage::delete('foto_guru/' . $guru->foto_guru);
        }

        $guru->delete();

        return redirect()->route('profil_guru.index')->with('success', 'Data guru berhasil dihapus.');
    }
}
