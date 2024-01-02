<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VisiMisi;

class VisiMisiController extends Controller
{
    public function index()
    {
        $data = VisiMisi::all();
        return view('admin.visi_misi.index', compact('data'));
    }

    public function showVisiMisi()
    {
        $data = VisiMisi::first();
        return view('visi_misi', compact('data'));
    }

    public function create()
    {
        return view('admin.visi_misi.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul_halaman' => 'required',
            'visi' => 'required',
            'misi' => 'required',
            'tujuan' => 'required',
        ]);

        VisiMisi::create($request->all());

        return redirect()->route('visi_misi.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data = VisiMisi::findOrFail($id);
        return view('admin.visi_misi.form', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul_halaman' => 'required',
            'visi' => 'required',
            'misi' => 'required',
            'tujuan' => 'required',
        ]);

        $data = VisiMisi::findOrFail($id);
        $data->update($request->all());

        return redirect()->route('visi_misi.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $data = VisiMisi::findOrFail($id);
        $data->delete();

        return redirect()->route('visi_misi.index')->with('success', 'Data berhasil dihapus.');
    }
}

