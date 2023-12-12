<?php

namespace App\Http\Controllers;

use App\Models\Murid;
use App\Models\Kelas;
use App\Models\TahunAngkatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class DataSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Mendapatkan data kelas dari tabel Kelas
        $kelas = Kelas::all();

        // Mendapatkan data tahun angkatan dari tabel TahunAngkatan
        $tahunAngkatan = TahunAngkatan::all();
        $search = $request->input('search');
        $murid = DB::table('murid')
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
        ->when($search, function ($query, $search) {
            return $query->where('kelas.ket_kelas', 'like', '%' . $search . '%')
            ->orWhere('murid.nama_murid', 'like', '%' . $search . '%');
        })
        ->paginate(10); // Menentukan jumlah data per halaman (misalnya, 10)
     
        return view("admin/data_siswa/kelas", compact('search','murid', 'kelas', 'tahunAngkatan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        // Menampilkan tampilan create untuk menambahkan data baru
        return view('admin.data_siswa.kelas');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nisn_murid' => 'required|unique:murid,nisn_murid',
            'nama_murid' => 'required',
            'jenis_kelamin' => 'required',
            'tgl_lahir' => 'required|date',
            'id_kelas' => 'required',
            'id_ta' => 'required',
        ]);
    
        Murid::create($validatedData);
    
        return redirect()->route('datasiswa')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(DataSiswa $dataSiswa)
    {
        //
    }
    
    public function edit($nisn)
    {
        // Retrieve the murid data
        $murid = Murid::where('nisn_murid', $nisn)->firstOrFail();
    
        // Retrieve data for dropdowns
        $kelas = Kelas::all();
        $tahunAngkatan = TahunAngkatan::all();
    
        // Pass data to the view
        return view('admin/data_siswa/kelas', compact('murid', 'kelas', 'tahunAngkatan'));
    }

    public function update(Request $request, $nisn)
    {
        $validatedData = $request->validate([
            'nisn_murid' => 'required',
            'nama_murid' => 'required',
            'jenis_kelamin' => 'required',
            'tgl_lahir' => 'required|date',
            'id_kelas' => 'required',
            'id_ta' => 'required',
        ]);
    
        $murid = Murid::where('nisn_murid', $nisn)->first();
        $murid->update($validatedData);
    
        return redirect()->route('datasiswa')->with('success', 'Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($nisn)
    {
        // Menghapus data murid berdasarkan NISN
        Murid::where('nisn_murid', $nisn)->delete();

        // Mengalihkan kembali ke halaman index dengan pesan sukses
        return redirect()->route('datasiswa')->with('success', 'Data berhasil dihapus');
    }
}
