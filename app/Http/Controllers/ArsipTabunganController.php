<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ArsipTabungan;
use App\Models\Murid;
use App\Models\Kelas;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use PDF;
use Illuminate\Support\Facades\Response;

class ArsipTabunganController extends Controller
{
    public function index(Request $request)
    {
        $murids = Murid::all();
        $kelas = Kelas::all();
        $arsipTabungan = DB::table('arsip_tabungan_bulanan')
            ->join('murid', 'arsip_tabungan_bulanan.id_siswa', '=', 'murid.id')
            ->join('kelas', 'arsip_tabungan_bulanan.id_kelas', '=', 'kelas.id')
            ->select(
                'murid.nama_murid as murid',
                'kelas.ket_kelas as kelas',
                'arsip_tabungan_bulanan.tanggal_arsip',
                'arsip_tabungan_bulanan.saldo',
                'arsip_tabungan_bulanan.total',
                DB::raw('DATE(arsip_tabungan_bulanan.updated_at) as updated_at')
            )
            ->orderBy('kelas.ket_kelas');

        // Filter data based on search date
        if ($request->has('search_date')) {
            $searchDate = $request->input('search_date');
            $arsipTabungan->whereDate('arsip_tabungan_bulanan.tanggal_arsip', $searchDate);
        }

        // Filter data for each week
        if ($request->has('weekly')) {
            $arsipTabungan->where(function ($query) {
                $query->whereDate('arsip_tabungan_bulanan.tanggal_arsip', '>=', Carbon::now()->startOfWeek())
                    ->whereDate('arsip_tabungan_bulanan.tanggal_arsip', '<=', Carbon::now()->endOfWeek());
            });
        }

        // Filter data for each month
        if ($request->has('monthly')) {
            $arsipTabungan->where(function ($query) {
                $query->whereDate('arsip_tabungan_bulanan.tanggal_arsip', '>=', Carbon::now()->startOfMonth())
                    ->whereDate('arsip_tabungan_bulanan.tanggal_arsip', '<=', Carbon::now()->endOfMonth());
            });
        }

        // berdasarkan kelas
        if ($request->has('kelas')) {
            $kelasFilter = $request->input('kelas');
            $arsipTabungan->where('arsip_tabungan_bulanan.id_kelas', $kelasFilter);
        }

        $arsipTabungan = $arsipTabungan->paginate(5);

        return view('admin/arsip_tabungan', compact('murids', 'kelas', 'arsipTabungan', 'request'));
    }

    private function filterWeekly($arsipTabungan)
    {
        return $arsipTabungan->filter(function ($arsip) {
            return Carbon::parse($arsip->tanggal_arsip)->isThisWeek();
        });
    }

    private function filterMonthly($arsipTabungan)
    {
        return $arsipTabungan->filter(function ($arsip) {
            return Carbon::parse($arsip->tanggal_arsip)->isThisMonth();
        });
    }


    public function downloadPdf(Request $request)
{
    $arsipTabungan = DB::table('arsip_tabungan_bulanan')
        ->join('murid', 'arsip_tabungan_bulanan.id_siswa', '=', 'murid.id')
        ->join('kelas', 'arsip_tabungan_bulanan.id_kelas', '=', 'kelas.id')
        ->select(
            'murid.nama_murid as murid',
            'kelas.ket_kelas as kelas',
            'arsip_tabungan_bulanan.tanggal_arsip',
            'arsip_tabungan_bulanan.saldo',
            'arsip_tabungan_bulanan.total',
            DB::raw('DATE(arsip_tabungan_bulanan.updated_at) as updated_at')
        )
        ->orderBy('kelas.ket_kelas')
        ->get();

    $pdf = PDF::loadView('admin.pdf.arsipTabungan', compact('arsipTabungan'));

    return $pdf->download('Arsip Tabungan.pdf');
}
}
