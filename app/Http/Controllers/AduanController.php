<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Murid;
use App\Models\Kelas;
use App\Models\KategoriAduan;
use App\Models\AduanSiswa;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
        $searchDate = $request->input('search_date');
    
        $aduanSiswa = DB::table('aduan_siswa')
            ->join('murid', 'aduan_siswa.id_siswa', '=', 'murid.id')
            ->join('kategori_aduan', 'aduan_siswa.id_aduan', '=', 'kategori_aduan.id')
            ->join('kelas', 'aduan_siswa.id_kelas', '=', 'kelas.id')
            ->select(
                'aduan_siswa.id',
                'aduan_siswa.id_siswa',
                'aduan_siswa.id_aduan',
                'aduan_siswa.id_kelas',
                'murid.nama_murid as nama_murid',
                'kelas.ket_kelas as kelas',
                'kategori_aduan.ket_aduan as kategori_aduan',
                'aduan_siswa.aduan',
                'aduan_siswa.bukti_aduan',
                'aduan_siswa.updated_at'
            )
            ->orderBy('kelas.ket_kelas')
            ->when($search, function ($query, $search) {
                return $query->where('murid.nama_murid', 'like', '%' . $search . '%')
                    ->orWhere('kelas.ket_kelas', 'like', '%' . $search . '%');
            })
            ->when($searchDate, function ($query, $searchDate) {
                return $query->whereDate('aduan_siswa.updated_at', $searchDate);
            });
    
        $aduanSiswa = $aduanSiswa->paginate(5);
    
        return view('/admin/aduan/data_aduan', compact('murids', 'kelas', 'kategoriAduan', 'aduanSiswa', 'searchDate'));
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
            'bukti_aduan' => $fileName,
        ]);
    
        return redirect()->back()->with('success', 'Aduan berhasil disimpan!');
    }

    public function destroy($id)
{
    $aduan = AduanSiswa::find($id);

    if (!$aduan) {
        return redirect()->back()->with('error', 'Aduan not found.');
    }

    // Hapus berkas bukti aduan dari storage
    if ($aduan->bukti_aduan) {
        $deleted = Storage::delete('public/bukti_aduan/' . $aduan->bukti_aduan);

        if (!$deleted) {
            return redirect()->back()->with('error', 'Failed to delete file.');
        }
    }

    // Hapus record aduan dari database
    $aduan->delete();

    return redirect()->back()->with('success', 'Aduan berhasil dihapus.');
}

public function getAduanDataById($id)
{
    $userData = DB::table('aduan_siswa')
        ->join('murid', 'aduan_siswa.id_siswa', '=', 'murid.id')
        ->join('kategori_aduan', 'aduan_siswa.id_aduan', '=', 'kategori_aduan.id')
        ->join('kelas', 'aduan_siswa.id_kelas', '=', 'kelas.id')
        ->select(
            'aduan_siswa.id',
            'aduan_siswa.id_siswa',
            'aduan_siswa.id_aduan',
            'aduan_siswa.id_kelas',
            'murid.nisn_murid as nisn_murid',
            'murid.nama_murid as nama_murid',
            'kelas.ket_kelas as kelas',
            'kategori_aduan.ket_aduan as kategori_aduan',
            'aduan_siswa.aduan',
            'aduan_siswa.bukti_aduan',
            'kelas.id as kelas_id',
            'aduan_siswa.updated_at'
        )
        ->where('aduan_siswa.id_siswa', $id)
        ->first();

    return response()->json($userData);
}

}


