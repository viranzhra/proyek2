<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Eskul;

class EskulController extends Controller
{
    public function index()
    {
        $eskuls = Eskul::all();
        return view('admin.eskuls.index', compact('eskuls'));
    }

    public function showEskul()
    {
        $eskuls = Eskul::all();
        return view('eskul', compact('eskuls'));
    }

    public function showAllEskul($id)
    {
        // Ambil data dari database berdasarkan ID atau kriteria tertentu
        $firstEskul = Eskul::find($id);
            
        return view('isieskul', compact('firstEskul'));
    }

    private function uploadFile($file)
    {
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads'), $filename);
        return $filename;
    }

    public function create()
    {
        return view('admin.eskuls.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'subjudul' => 'required',
            'deskripsi' => 'required',
            'foto_tampilan' => 'required|image|mimes:jpeg,png,jpg,gif',
            'foto_dokumentasi1' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'foto_dokumentasi2' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        $input = $request->all();

        // Handle file uploads
        $input['foto_tampilan'] = $this->uploadFile($request->file('foto_tampilan'));
        $input['foto_dokumentasi1'] = $this->uploadFile($request->file('foto_dokumentasi1'));
        $input['foto_dokumentasi2'] = $this->uploadFile($request->file('foto_dokumentasi2'));

        Eskul::create($input);

        return redirect()->route('eskuls.index')->with('success', 'Eskul created successfully');
    }

    public function edit($id)
    {
        $eskul = Eskul::findOrFail($id);
        return view('admin.eskuls.edit', compact('eskul'));
    }

    public function update(Request $request, $id)
    {
        $eskul = Eskul::find($id);

        $request->validate([
            'subjudul' => 'required',
            'deskripsi' => 'required',
            'foto_tampilan' => 'image|mimes:jpeg,png,jpg,gif',
            'foto_dokumentasi1' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'foto_dokumentasi2' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        $input = $request->all();

        // Handle file uploads
        if ($request->hasFile('foto_tampilan')) {
            $input['foto_tampilan'] = $this->uploadFile($request->file('foto_tampilan'));
        }
        if ($request->hasFile('foto_dokumentasi1')) {
            $input['foto_dokumentasi1'] = $this->uploadFile($request->file('foto_dokumentasi1'));
        }
        if ($request->hasFile('foto_dokumentasi2')) {
            $input['foto_dokumentasi2'] = $this->uploadFile($request->file('foto_dokumentasi2'));
        }

        $eskul->update($input);

        return redirect()->route('eskuls.index')->with('success', 'Eskul updated successfully');
    }

    public function destroy($id)
    {
        $eskul = Eskul::find($id);
    
        // Check if Eskul is found
        if (!$eskul) {
            return redirect()->route('eskuls.index')->with('error', 'Eskul not found');
        }
    
        $eskul->delete();
    
        return redirect()->route('eskuls.index')->with('success', 'Eskul deleted successfully');
    }
    
}
