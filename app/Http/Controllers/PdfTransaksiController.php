<?php
// PDFController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransaksiTabungan;
use Illuminate\Support\Facades\DB;
use PDF;

class PdfTransaksiController extends Controller
{
    public function downloadPDF(Request $request)
    {
        $selectedClass = $request->input('selectedClass'); 

        $transaksis = DB::table('transaksi_tabungan')
            ->join('murid', 'transaksi_tabungan.id_siswa', '=', 'murid.id')
            ->join('kategori_transaksi', 'transaksi_tabungan.id_kategori', '=', 'kategori_transaksi.id')
            ->join('kelas', 'transaksi_tabungan.id_kelas', '=', 'kelas.id')
            ->select(
                'murid.nama_murid as murid',
                'kelas.ket_kelas as kelas',
                'kategori_transaksi.deskripsi as kategori_transaksi',
                'transaksi_tabungan.tanggal',
                'transaksi_tabungan.nominal',
                'transaksi_tabungan.total'
            )
            ->orderBy('kelas.ket_kelas');

        // berdasarkan kelas
        if ($selectedClass) {
            $transaksis->where('kelas.ket_kelas', $selectedClass);
        }

        $transaksis = $transaksis->get();

        $pdf = PDF::loadView('admin.pdf.transaksi', compact('transaksis'));

        return $pdf->download('Transaksi Tabungan.pdf');
    }
}
