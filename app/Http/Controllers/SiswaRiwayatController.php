<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransaksiTabungan;
use Illuminate\Support\Facades\Auth;

class SiswaRiwayatController extends Controller
{
    public function index(Request $request)
    {
        // Get the authenticated user
        $user = Auth::user();

        // Fetch transactions associated with the authenticated user (assuming id_siswa is the foreign key linking users to students)
        $transaksiTabungan = TransaksiTabungan::where('id_siswa', $user->id_siswa)
            ->when($request->has('search_date'), function ($query) use ($request) {
                $query->whereDate('tanggal', $request->input('search_date'));
            })
            ->get();

        // Pass the data to the view
        return view("siswa/riwayat/riwayat_siswa", [
            'transaksiTabungan' => $transaksiTabungan,
            'searchDate' => $request->input('search_date'),
        ]);
    }

    // Other methods...
}
