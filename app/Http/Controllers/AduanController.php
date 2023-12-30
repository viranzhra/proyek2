<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Murid;
use App\Models\Kelas;
use App\Models\KategoriAduan;
use App\Models\AduanSiswa;
use Illuminate\Support\Facades\DB;

class AduanController extends Controller
{
    public function showForm()
    {
        $murids = Murid::all();
        $kelas = Kelas::all();
        $kategoriAduan = KategoriAduan::all();

        return view('/siswa/ajukan_aduan/ajukan', compact('murids', 'kelas', 'kategoriAduan'));
    }

    public function index(Request $request)
    {
        $murids = Murid::all();
        $kelas = Kelas::all();
        $kategoriAduan = KategoriAduan::all(); 
        $search = $request->input('search');
        $searchDate = $request->input('search_date', now()->format('l, d F Y'));

        $aduanSiswa = DB::table('aduan_siswa')
            ->join('murid', 'aduan_siswa.id_siswa', '=', 'murid.id')
            ->join('kategori_aduan', 'aduan_siswa.id_aduan', '=', 'kategori_aduan.id')
            ->join('kelas', 'aduan_siswa.id_kelas', '=', 'kelas.id')
            ->select(
                'aduan_siswa.id_siswa',
                'aduan_siswa.id_aduan',
                'aduan_siswa.id_kelas',
                'murid.nama_murid as nama_murid',
                'kelas.ket_kelas as kelas',
                'kategori_aduan.ket_aduan as kategori_aduan',
                'aduan_siswa.aduan',
                'aduan_siswa.bukti_aduan'
            )
            ->orderBy('kelas.ket_kelas')
            ->when($search, function ($query, $search) {
                return $query->where('murid.nama_murid', 'like', '%' . $search . '%')
                    ->orWhere('kelas.ket_kelas', 'like', '%' . $search . '%');
            });

            $aduanSiswa = $aduanSiswa->paginate(5);

        return view('/admin/aduan/data_aduan', compact('murids', 'kelas', 'kategoriAduan', 'aduanSiswa'));
    }


    public function store(Request $request)
    {
        // Validasi data yang diinput
        $request->validate([
            'id_siswa' => 'required',
            'id_kelas' => 'required',
            'kategori_aduan' => 'required', // Tambahkan validasi untuk kategori_aduan
            'aduan' => 'required',
            'bukti_aduan' => 'file|mimes:jpeg,png,pdf|max:2048',
        ]);


            if ($request->hasFile('bukti_aduan')) {
                $fileName = time() . '_' . $request->file('bukti_aduan')->getClientOriginalName();
                $request->file('bukti_aduan')->storeAs('public/bukti_aduan', $fileName);

                $request['bukti_aduan'] = $fileName;
            }
    
        // Simpan aduan ke dalam tabel aduan_siswa
        AduanSiswa::create([
            'id_siswa' => $request->id_siswa,
            'id_kelas' => $request->id_kelas,
            'id_aduan' => $request->kategori_aduan, // Sesuaikan dengan nama kolom yang sesuai
            'aduan' => $request->aduan,
            'bukti_aduan' => $request->bukti_aduan,
        ]);
    
        return redirect()->back()->with('success', 'Aduan berhasil disimpan!');
    }
}
