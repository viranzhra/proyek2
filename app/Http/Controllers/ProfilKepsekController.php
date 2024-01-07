<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfilKepsek;
use Illuminate\Support\Facades\Storage;

class ProfilKepsekController extends Controller
{
    public function index()
    {
        $profilKepsek = ProfilKepsek::all();
        return view('admin.profil_guru.index', compact('profilKepsek'));
    }

    public function create()
    {
        return view('admin.profil_kepsek.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kepsek' => 'required|string|max:255',
            'alamat' => 'required|string',
            'foto_kepsek' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'foto_bersama' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $input = $request->all();

        if ($request->hasFile('foto_kepsek')) {
            $fotoKepsek = $request->file('foto_kepsek');
            $fotoKepsekName = time() . '_' . $fotoKepsek->getClientOriginalName();
            $fotoKepsek->storeAs('foto_kepsek', $fotoKepsekName, 'public');
            $input['foto_kepsek'] = $fotoKepsekName;
        }

        if ($request->hasFile('foto_bersama')) {
            $fotoBersama = $request->file('foto_bersama');
            $fotoBersamaName = time() . '_' . $fotoBersama->getClientOriginalName();
            $fotoBersama->storeAs('foto_bersama', $fotoBersamaName, 'public');
            $input['foto_bersama'] = $fotoBersamaName;
        }

        ProfilKepsek::create($input);

        return redirect()->route('profil_guru.index')->with('success-kepsek', 'Data kepala sekolah berhasil ditambahkan.');
    }

    public function showKepsek()
    {
        $profilKepsek = ProfilKepsek::all();
        return view('profilguru', compact('profilKepsek'));
    }

    public function edit($id)
    {
        $profilKepsek = ProfilKepsek::findOrFail($id);
        return view('admin.profil_kepsek.edit', compact('profilKepsek'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kepsek' => 'required|string|max:255',
            'alamat' => 'required|string',
            'foto_kepsek' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'foto_bersama' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $profilKepsek = ProfilKepsek::findOrFail($id);
        $input = $request->all();

        if ($request->hasFile('foto_kepsek')) {
            if ($profilKepsek->foto_kepsek) {
                Storage::delete('foto_kepsek/' . $profilKepsek->foto_kepsek);
            }

            $fotoKepsek = $request->file('foto_kepsek');
            $fotoKepsekName = time() . '_' . $fotoKepsek->getClientOriginalName();
            $fotoKepsek->storeAs('foto_kepsek', $fotoKepsekName, 'public');
            $input['foto_kepsek'] = $fotoKepsekName;
        }

        if ($request->hasFile('foto_bersama')) {
            if ($profilKepsek->foto_bersama) {
                Storage::delete('foto_bersama/' . $profilKepsek->foto_bersama);
            }

            $fotoBersama = $request->file('foto_bersama');
            $fotoBersamaName = time() . '_' . $fotoBersama->getClientOriginalName();
            $fotoBersama->storeAs('foto_bersama', $fotoBersamaName, 'public');
            $input['foto_bersama'] = $fotoBersamaName;
        }

        $profilKepsek->update($input);

        return redirect()->route('profil_guru.index')->with('success-kepsek', 'Data kepala sekolah berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $profilKepsek = ProfilKepsek::findOrFail($id);

        if ($profilKepsek->foto_kepsek) {
            Storage::delete('foto_kepsek/' . $profilKepsek->foto_kepsek);
        }

        if ($profilKepsek->foto_bersama) {
            Storage::delete('foto_bersama/' . $profilKepsek->foto_bersama);
        }

        $profilKepsek->delete();

        return redirect()->route('profil_guru.index')->with('success-kepsek', 'Data kepala sekolah berhasil dihapus.');
    }
}
