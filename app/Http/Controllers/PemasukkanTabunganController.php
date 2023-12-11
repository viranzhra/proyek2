<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PemasukkanTabungan;
use App\Models\Murid;
use Illuminate\Support\Facades\DB;

class PemasukkanTabunganController extends Controller
{
    public function index()
    {
        $pemasukkanTabungan = DB::table('pemasukkan_tabungan')
        ->join('murid', 'pemasukkan_tabungan.id_siswa', '=', 'murid.id')
        ->select(
           'murid.nama_murid as murid',
           'pemasukkan_tabungan.tanggal_pemasukkan',
           'pemasukkan_tabungan.nominal',
           'pemasukkan_tabungan.total'
        )
        ->get();
        return view('admin/pemasukkan/kelas7', compact('pemasukkanTabungan'));
    }
    

    public function create()
    {
        $murids = Murid::all();
        return view('admin/pemasukkan/isi_saldo', compact('murids'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_siswa' => 'required',
            'tanggal_pemasukkan' => 'required|date',
            'nominal' => 'required|numeric',
        ]);

        $murid = Murid::findOrFail($request->id_siswa);

        PemasukkanTabungan::create([
            'id_siswa' => $request->id_siswa,
            'tanggal_pemasukkan' => $request->tanggal_pemasukkan,
            'nominal' => $request->nominal,
            'total' => $murid->total + $request->nominal,
        ]);

        // Update total saldo pada tabel murid
        $murid->update(['total' => $murid->total + $request->nominal]);

        return redirect()->route('pemasukan.create')->with('success', 'Pemasukkan tabungan berhasil ditambahkan.');
    }
    
}
