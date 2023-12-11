<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Murid;
use Illuminate\Support\Facades\DB;

class TransaksiTabunganController extends Controller
{
    public function index(Request $request)
    {

        $search = $request->input('search');
        $murid = DB::table('transaksi_tabungan')
        ->join('murid', 'transaksi_tabungan.id_siswa', '=', 'murid.id')
        ->join('Kategori_transaksi', 'transaksi_tabungan.id_kategori', '=', 'kategori_transaksi.id')
        ->select(
            'murid.nama_murid as murid',
            'transaksi_tabungan.tanggal',
            'kategori_transaksi.deskripsi as kategori_transaksi',
            'transaksi_tabungan.nominal'

        )
        ->when($search, function ($query, $search) {
            return $query->where('murid.nama_murid', 'like', '%' . $search . '%');
        })
        ->get(); 
     
        return view("siswa/riwayat/riwayat_siswa", compact('murid'));
    }
}
