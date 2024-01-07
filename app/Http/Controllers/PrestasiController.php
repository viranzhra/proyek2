<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prestasi;
use App\Models\AllPrestasi;

class PrestasiController extends Controller
{
    public function index()
    {
        $allPrestasis = AllPrestasi::paginate(2);
        $prestasis = Prestasi::all();
        return view('admin.prestasi.index', compact('prestasis','allPrestasis'));
    }

    public function showPrestasi()
    {
        $allPrestasis = AllPrestasi::all();
        $prestasis = Prestasi::all();
        return view('prestasi', compact('prestasis', 'allPrestasis'));
    }

    public function create()
    {
        return view('admin.prestasi.create');
    }

    public function store(Request $request)
    {
        // Validasi input jika diperlukan, termasuk validasi file gambar
        $request->validate([
            'judul_utama' => 'required',
            'gambar_utama' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Mengelola file gambar
        $gambarUtama = $request->file('gambar_utama');
        $gambarUtamaName = time() . '.' . $gambarUtama->extension();
        $gambarUtama->move(public_path('images/'), $gambarUtamaName);

        // Membuat data prestasi baru
        Prestasi::create([
            'judul_utama' => $request->judul_utama,
            'gambar_utama' => $gambarUtamaName,
        ]);

        return redirect()->route('prestasis.index')
            ->with('success-judul-utama', 'Judul berhasil ditambahkan!');
    }

    public function edit(Prestasi $prestasi)
    {
        return view('admin.prestasi.edit', compact('prestasi'));
    }

    public function update(Request $request, Prestasi $prestasi)
{
    // Validasi input jika diperlukan, termasuk validasi file gambar
    $request->validate([
        'judul_utama' => 'required',
        'gambar_utama' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    // Mengelola file gambar jika ada
    if ($request->hasFile('gambar_utama')) {
        // Pastikan gambar_utama sebelumnya memiliki nilai dan file tersebut ada
        if ($prestasi->gambar_utama && file_exists(public_path('images/') . $prestasi->gambar_utama)) {
            // Hapus file gambar terkait yang lama
            unlink(public_path('images/') . $prestasi->gambar_utama);
        }

        // Upload dan pindahkan file gambar yang baru
        $gambarUtama = $request->file('gambar_utama');
        $gambarUtamaName = time() . '.' . $gambarUtama->extension();
        $gambarUtama->move(public_path('images/'), $gambarUtamaName);

        // Update gambar_utama pada model Prestasi
        $prestasi->update([
            'judul_utama' => $request->judul_utama,
            'gambar_utama' => $gambarUtamaName,
        ]);
    } else {
        // Jika tidak ada file gambar baru, hanya update judul_utama
        $prestasi->update([
            'judul_utama' => $request->judul_utama,
        ]);
    }

    return redirect()->route('prestasis.index')
        ->with('success-judul-utama', 'Prestasi berhasil diperbarui!');
}

    public function destroy(Prestasi $prestasi)
    {
        // Pastikan gambar_utama memiliki nilai dan file tersebut ada
        if ($prestasi->gambar_utama && file_exists(public_path('images/') . $prestasi->gambar_utama)) {
            // Hapus file gambar terkait sebelum menghapus data prestasi
            unlink(public_path('images/') . $prestasi->gambar_utama);
        }
    
        // Hapus data prestasi
        $prestasi->delete();
    
        return redirect()->route('prestasis.index')
            ->with('success-judul-utama', 'Prestasi berhasil dihapus!');
    }
}
