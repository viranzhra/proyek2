<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AllPrestasi;
use App\Models\Prestasi;
use Illuminate\Support\Facades\DB;

class AllPrestasiController extends Controller
{
    public function index()
    {
        $allPrestasis = AllPrestasi::all();
        $prestasis = Prestasi::all();
        return view('admin.prestasi.index', compact('prestasis','allPrestasis'));
    }

    public function showAllPrestasi($id)
    {
        // Ambil data dari database berdasarkan ID atau kriteria tertentu
        $allPrestasiCollection = AllPrestasi::where('id', $id)->get();

        // Pastikan menggunakan first() untuk mendapatkan objek tunggal
        $firstPrestasi = $allPrestasiCollection->first();
            
        return view('isiprestasi', compact('firstPrestasi'));
    }

    public function create()
    {
        return view('admin.all_prestasis.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'subjudul' => 'required',
            'deskripsi' => 'required',
            'foto_tampilan' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'foto_dokumentasi' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $fotoTampilan = $request->file('foto_tampilan');
        $fotoTampilanName = time() . '_tampilan.' . $fotoTampilan->extension();
        $fotoTampilan->move(public_path('images/'), $fotoTampilanName);

        $fotoDokumentasi = $request->file('foto_dokumentasi');
        $fotoDokumentasiName = time() . '_dokumentasi.' . $fotoDokumentasi->extension();
        $fotoDokumentasi->move(public_path('images/'), $fotoDokumentasiName);

        AllPrestasi::create([
            'subjudul' => $request->subjudul,
            'deskripsi' => $request->deskripsi,
            'foto_tampilan' => $fotoTampilanName,
            'foto_dokumentasi' => $fotoDokumentasiName,
        ]);

        return redirect()->route('all-prestasis.index')
            ->with('success-daftar-prestasi', 'Daftar prestasi berhasil ditambahkan!');
    }

    public function edit(AllPrestasi $allPrestasi)
    {
        return view('admin.all_prestasis.edit', compact('allPrestasi'));
    }

    public function update(Request $request, AllPrestasi $allPrestasi)
    {
        $request->validate([
            'subjudul' => 'required',
            'deskripsi' => 'required',
            'foto_tampilan' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'foto_dokumentasi' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('foto_tampilan')) {
            // Hapus file foto tampilan sebelumnya jika ada
            if ($allPrestasi->foto_tampilan && file_exists(public_path('images/') . $allPrestasi->foto_tampilan)) {
                unlink(public_path('images/') . $allPrestasi->foto_tampilan);
            }

            // Upload dan pindahkan file foto tampilan yang baru
            $fotoTampilan = $request->file('foto_tampilan');
            $fotoTampilanName = time() . '_tampilan.' . $fotoTampilan->extension();
            $fotoTampilan->move(public_path('images/'), $fotoTampilanName);
        } else {
            $fotoTampilanName = $allPrestasi->foto_tampilan;
        }

        if ($request->hasFile('foto_dokumentasi')) {
            // Hapus file foto dokumentasi sebelumnya jika ada
            if ($allPrestasi->foto_dokumentasi && file_exists(public_path('images/') . $allPrestasi->foto_dokumentasi)) {
                unlink(public_path('images/') . $allPrestasi->foto_dokumentasi);
            }

            // Upload dan pindahkan file foto dokumentasi yang baru
            $fotoDokumentasi = $request->file('foto_dokumentasi');
            $fotoDokumentasiName = time() . '_dokumentasi.' . $fotoDokumentasi->extension();
            $fotoDokumentasi->move(public_path('images/'), $fotoDokumentasiName);
        } else {
            $fotoDokumentasiName = $allPrestasi->foto_dokumentasi;
        }

        $allPrestasi->update([
            'subjudul' => $request->subjudul,
            'deskripsi' => $request->deskripsi,
            'foto_tampilan' => $fotoTampilanName,
            'foto_dokumentasi' => $fotoDokumentasiName,
        ]);

        return redirect()->route('all-prestasis.index')
            ->with('success-daftar-prestasi', 'Data prestasi berhasil diperbarui!');
    }

    public function destroy(AllPrestasi $allPrestasi)
    {
        // Hapus file foto tampilan sebelum menghapus data prestasi
        if ($allPrestasi->foto_tampilan && file_exists(public_path('images/') . $allPrestasi->foto_tampilan)) {
            unlink(public_path('images/') . $allPrestasi->foto_tampilan);
        }

        // Hapus file foto dokumentasi sebelum menghapus data prestasi
        if ($allPrestasi->foto_dokumentasi && file_exists(public_path('images/') . $allPrestasi->foto_dokumentasi)) {
            unlink(public_path('images/') . $allPrestasi->foto_dokumentasi);
        }

        $allPrestasi->delete();

        return redirect()->route('all-prestasis.index')
            ->with('success-daftar-prestasi', 'Data prestasi berhasil dihapus!');
    }
}
