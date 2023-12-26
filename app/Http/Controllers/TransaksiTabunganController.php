<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransaksiTabungan;
use App\Models\Murid;
use App\Models\Kelas;
use App\Models\KategoriTransaksi;
use App\Models\ArsipTabungan; 
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;

class TransaksiTabunganController extends Controller
{
    public function index(Request $request)
    {
        $murids = Murid::all();
        $kelas = Kelas::all();
        $kategoriTransaksis = KategoriTransaksi::all();
        $search = $request->input('search');
    
        $transaksis = DB::table('transaksi_tabungan')
            ->join('murid', 'transaksi_tabungan.id_siswa', '=', 'murid.id')
            ->join('kategori_transaksi', 'transaksi_tabungan.id_kategori', '=', 'kategori_transaksi.id')
            ->join('kelas', 'transaksi_tabungan.id_kelas', '=', 'kelas.id')
            ->select(
                'transaksi_tabungan.id',
                'transaksi_tabungan.id_kategori',
                'transaksi_tabungan.id_kelas',
                'murid.nisn_murid as nisn_murid',
                'murid.nama_murid as nama_murid',
                'kelas.ket_kelas as kelas',
                'kategori_transaksi.deskripsi as kategori_transaksi',
                'transaksi_tabungan.tanggal',
                'transaksi_tabungan.nominal',
                'transaksi_tabungan.total'
            )
            ->orderBy('kelas.ket_kelas')
            ->when($search, function ($query, $search) {
                return $query->where('murid.nama_murid', 'like', '%' . $search . '%')
                    ->orWhere('kelas.ket_kelas', 'like', '%' . $search . '%');
            });
    
        // Filter data based on search date
        if ($request->has('search_date')) {
            $searchDate = $request->input('search_date');
            $transaksis->whereDate('transaksi_tabungan.tanggal', $searchDate);
        }

        $transaksis = $transaksis->paginate(5); // Menentukan jumlah data per halaman
    
        return view("admin/pemasukkan/transaksi", compact('search', 'murids', 'kelas', 'kategoriTransaksis', 'transaksis'));
    }
    

    // Fungsi untuk menampilkan form tambah transaksi
    public function create()
    {
        $murids = Murid::all();
        $kelas = Kelas::all();
        $kategoriTransaksis = KategoriTransaksi::all();
        return view('admin/pemasukkan/isi_saldo', compact('murids', 'kelas', 'kategoriTransaksis'));
    }

    // Fungsi untuk menyimpan transaksi baru
    public function store(Request $request)
    {
        // Validasi request di sini sesuai kebutuhan
        $request->validate([
            'id_siswa' => 'required',
            'tanggal' => 'required',
            'id_kategori' => 'required',
            'nominal' => 'required',
        ]);
    
        // Buat transaksi baru
        $transaksi = TransaksiTabungan::create($request->all());
    
        // Hitung nilai total berdasarkan kondisi
        $nilaiTotal = $request->id_kategori == 1 ? $transaksi->nominal : abs($transaksi->nominal);
    
        // Update nilai total pada transaksi
        $transaksi->total = $nilaiTotal;
        $transaksi->save();
    
        // Lakukan pemrosesan arsip tabungan, update saldo, dll. sesuai kebutuhan
        $this->processTabungan($transaksi);
    
        return redirect()->route('transaksi-tabungan.index')->with('success', 'Transaksi berhasil ditambahkan');
    }

    private function processTabungan(TransaksiTabungan $transaksi)
    {
        $nilaiTotal = 0;
        
        if ($transaksi->id_kategori == 1) {
            $nilaiTotal += $transaksi->nominal;
        } else {
            $nilaiTotal -= $transaksi->nominal;
        }
    
        // Ambil total sebelumnya dari arsip_tabungan
        $arsipTabungan = ArsipTabungan::where('id_siswa', $transaksi->id_siswa)
            ->orderBy('tanggal_arsip', 'desc')
            ->first();
    
        // Jika belum ada arsip_tabungan sebelumnya, buat baru
        if (!$arsipTabungan) {
            $arsipTabungan = ArsipTabungan::create([
                'id_siswa' => $transaksi->id_siswa,
                'id_kelas' => $transaksi->id_kelas,
                'tanggal_arsip' => now()->toDateString(),
                'total' => $nilaiTotal,
                'saldo' => $transaksi->nominal,
            ]);
        } else {
            // Jika sudah ada, tambahkan total baru ke total sebelumnya
            $arsipTabungan->total += $nilaiTotal;
            $arsipTabungan->save();
        }
    }
    

        // Fungsi untuk menampilkan detail transaksi
        public function show(TransaksiTabungan $transaksis)
        {
            return view('admin/pemasukkan/transaksi', compact('transaksis'));
        }

    // Fungsi untuk menampilkan form edit transaksi
    public function edit($nisn)
    {
        // Temukan data transaksi berdasarkan NISN yang diberikan
        $transaksi = TransaksiTabungan::where('nisn_murid', $nisn)->firstOrFail();

        // Retrieve data for dropdowns or any other necessary data
        $kategoriTransaksis = KategoriTransaksi::all();

        // Pass data to the view
        return view('admin.pemasukkan.transaksi', compact('transaksi', 'kategoriTransaksis'));
    }

    // Fungsi untuk menyimpan perubahan pada transaksi
    public function update(Request $request, $nisn)
    {
        // Validasi request di sini sesuai kebutuhan
        $request->validate([
            'id_siswa' => 'required',
            'id_kelas' => 'required',
            'tanggal' => 'required',
            'id_kategori' => 'required',
            'nominal' => 'required',
        ]);

        // Temukan data transaksi berdasarkan NISN yang diberikan
        $transaksi = TransaksiTabungan::where('nisn_murid', $nisn)->firstOrFail();

        // Update transaksi
        $transaksi->update($request->all());

        // Lakukan pemrosesan arsip tabungan, update saldo, dll. sesuai kebutuhan
        $this->processTabungan($transaksi);

        return redirect()->route('transaksi-tabungan.index')->with('success', 'Transaksi berhasil diperbarui');
    }


    // Fungsi untuk menghapus transaksi
    public function destroy($nisn)
    {
        // Temukan data transaksi berdasarkan NISN yang diberikan
        $transaksi = TransaksiTabungan::where('nisn_murid', $nisn)->first();
    
        if ($transaksi) {
            // Hapus data transaksi
            $transaksi->delete();
    
            // Atur pesan sukses
            session()->flash('success', 'Transaksi berhasil dihapus.');
        } else {
            // Atur pesan error jika data transaksi tidak ditemukan
            session()->flash('error', 'Transaksi tidak ditemukan.');
        }
    
        // Redirect kembali ke halaman indeks dengan pesan sukses atau error
        return redirect()->route('transaksi-tabungan.index');
    }
    

    // Fungsi untuk mendapatkan nama murid berdasarkan ID
    public function getMuridName($id)
    {
        $murid = Murid::find($id);

        return response()->json(['nama_murid' => $murid->nama_murid]);
    }

    // Fungsi untuk mendapatkan kelas berdasarkan nama murid
    public function getClassByStudent(Request $request)
    {
        // Dapatkan nama murid dari request
        $studentName = $request->input('studentName');

        // Cari data murid berdasarkan nama
        $murid = Murid::where('nama_murid', $studentName)->first();

        // Jika murid ditemukan, ambil kelasnya
        if ($murid) { 
            $classData = Kelas::find($murid->id_kelas);

            // Jika kelas ditemukan, kembalikan data sebagai respons JSON
            if ($classData) {
                return response()->json(['id_kelas' => $classData->id_kelas, 'ket_kelas' => $classData->ket_kelas]);
            }
        }

        // Jika tidak ditemukan, kembalikan respons JSON kosong atau sesuaikan dengan kebutuhan
        return response()->json([]);
    }
}
