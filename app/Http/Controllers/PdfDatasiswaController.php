<?php
// PDFController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Murid;
use Illuminate\Support\Facades\DB;
use PDF;

class PdfDatasiswaController extends Controller
{
    public function downloadPDF(Request $request)
    {
        $datasiswa = DB::table('murid')
        ->join('kelas', 'murid.id_kelas', '=', 'kelas.id')
        ->join('tahun_angkatan', 'murid.id_ta', '=', 'tahun_angkatan.id')
        ->select(
            'murid.id_kelas',
            'murid.id_ta',
            'murid.nisn_murid',
            'murid.nama_murid',
            'murid.jenis_kelamin',
            'murid.tgl_lahir',
            'kelas.ket_kelas as kelas',
            'tahun_angkatan.tahun as tahun_angkatan'
            )
            ->orderBy('kelas.ket_kelas')
            ->get();
    
        $pdf = PDF::loadView('admin.pdf.datasiswa', compact('datasiswa'));
    
        return $pdf->download('Data Siswa.pdf');
    }
}