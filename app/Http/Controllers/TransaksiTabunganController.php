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
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class TransaksiTabunganController extends Controller
{
    public function index(Request $request)
    {
        $murids = Murid::all();
        $kelas = Kelas::all();
        $kategoriTransaksis = KategoriTransaksi::all();
        $search = $request->input('search');
        $searchDate = $request->input('search_date');
        $searchDate = $request->input('search_date') ?? Carbon::now()->toDateString();

        // Exclude the specific date filtering
        $transaksis = DB::table('transaksi_tabungan')
            ->join('murid', 'transaksi_tabungan.id_siswa', '=', 'murid.id')
            ->join('kategori_transaksi', 'transaksi_tabungan.id_kategori', '=', 'kategori_transaksi.id')
            ->join('kelas', 'transaksi_tabungan.id_kelas', '=', 'kelas.id')
            ->select(
                'transaksi_tabungan.id',
                'transaksi_tabungan.id_siswa',
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
            })
            ->when($searchDate, function ($query, $searchDate) {
                // Add condition to filter by transaction date
                return $query->whereDate('transaksi_tabungan.tanggal', 'like', '%' . $searchDate . '%');
            });

        $transaksis = $transaksis->paginate(5);

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

    private function getTotalSaldoBulananForStudent($studentId, $classId)
{
    // Cari arsip bulanan terbaru untuk siswa dan kelas tertentu
    $latestArsipBulanan = ArsipTabungan::where('id_siswa', $studentId)
        ->where('id_kelas', $classId)
        ->latest('tanggal_arsip')
        ->first();

    // Jika arsip bulanan tidak ditemukan, kembalikan nilai 0
    if (!$latestArsipBulanan) {
        return 0;
    }

    // Jika ditemukan, kembalikan total dari arsip bulanan terbaru
    return $latestArsipBulanan->total;
}

    // Fungsi untuk menyimpan transaksi baru
    public function store(Request $request)
    {
        // Validasi request di sini sesuai kebutuhan
        $request->validate([
            'id_siswa' => 'required',
            'id_kelas' => 'required',
            'tanggal' => 'required',
            'id_kategori' => 'required',
            'nominal' => 'required',
        ]);
    
        // Jika kategori transaksi adalah pengeluaran
        if ($request->id_kategori == 2) {
            // Hitung total saldo siswa
            $totalSaldo = $this->getTotalSaldoBulananForStudent($request->id_siswa, $request->id_kelas);
    
            // Check if the withdrawal amount is greater than the total balance or if the student has no prior transactions
            if ($request->nominal > $totalSaldo) {
                return redirect()->route('transaksi-tabungan.index')->with('saldo_kurang', 'Maaf, Saldo Siswa Tidak Mencukupi');
            }
        }
    
        // Buat transaksi baru
        $transaksi = TransaksiTabungan::create($request->all());
    
        // Hitung nilai total berdasarkan kondisi
        $nilaiTotal = $request->id_kategori == 1 ? $transaksi->nominal : abs($transaksi->nominal);
    
        // Update nilai total pada transaksi
        $transaksi->total = $nilaiTotal;
        $transaksi->save();
    
        // Lakukan pemrosesan arsip tabungan, update saldo, dll. sesuai kebutuhan
        $this->processTabungan($transaksi);
    
        // Tentukan pesan sukses berdasarkan kategori transaksi
        $pesanSukses = $request->id_kategori == 2 ? 'Transaksi pengeluaran berhasil' : 'Transaksi berhasil ditambahkan';
    
        // Redirect ke halaman indeks dengan pesan sukses
        return redirect()->route('transaksi-tabungan.index')->with('success', $pesanSukses);
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

    public function update(Request $request, $id)
    {
        // Validasi request sesuai kebutuhan
        $request->validate([
            'id_siswa' => 'required',
            'id_kelas' => 'required',
            'tanggal' => 'required',
            'id_kategori' => 'required',
            'nominal' => 'required',
        ]);
    
        // Temukan data transaksi berdasarkan ID yang diberikan
        $transaksi = TransaksiTabungan::find($id);
    
        // Check if the transaction exists
        if (!$transaksi) {
            return redirect()->route('transaksi-tabungan.index')->with('error', 'Transaksi tidak ditemukan.');
        }
        
        // Update specific fields instead of all fields
        $transaksi->update([
            'id_siswa' => $request->input('id_siswa'),
            'id_kelas' => $request->input('id_kelas'),
            'tanggal' => Carbon::parse($request->input('tanggal')),            'id_kategori' => $request->input('id_kategori'),
            'nominal' => $request->input('nominal'),
            // Add other fields as needed
        ]);
    
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

    public function getClassByStudent(Request $request)
    {
        $studentName = $request->input('id_siswa');
    
        $murid = Murid::where('nama_murid', $studentName)->first();
    
        if ($murid) {
            return response()->json([
                'id_siswa' => $murid->id,
                'id_kelas' => $murid->id_kelas,
                'nama_murid' => $murid->nama_murid,
                // tambahkan data lain yang mungkin diperlukan
            ]);
        }
    
        return response()->json([]);
    }
    

    public function tambahSaldo(Request $request)
    {
        // Validasi request sesuai kebutuhan
        $request->validate([
            'id_siswa' => 'required',
            'id_kelas' => 'required',
            'tanggal' => 'required',
            'id_kategori' => 'required',
            'nominal' => 'required',
        ]);

        // Dapatkan nama murid dari request
        $namaMurid = $request->input('id_siswa'); // Sesuaikan dengan nama field pada form

        // Temukan ID siswa berdasarkan nama murid
        $murid = Murid::where('nama_murid', $namaMurid)->first();

        // Cek apakah murid ditemukan
        if (!$murid) {
            // Tindakan yang sesuai jika murid tidak ditemukan (misalnya, tampilkan pesan kesalahan)
            return redirect()->route('transaksi-tabungan.index')->with('error', 'Murid tidak ditemukan');
        }

        // Check jika kategori transaksi adalah pengeluaran (id_kategori = 2)
        if ($request->id_kategori == 2) {
            // Hitung total saldo siswa sekarang
            $saldoSiswa = $this->getTotalSaldoForStudent($murid->id);

            // Cek apakah saldo mencukupi untuk pengeluaran
            if ($saldoSiswa < $request->nominal) {
                // Tampilkan notifikasi bahwa saldo siswa tidak mencukupi
                Session::flash('saldo_kurang', 'Maaf, Saldo Siswa Kurang');

                // Redirect kembali ke halaman indeks dengan pesan kesalahan
                return redirect()->route('transaksi-tabungan.index');
            }
        }

        // Buat transaksi baru hanya dengan data yang diperlukan
        $transaksi = TransaksiTabungan::create([
            'id_siswa' => $murid->id, // Menggunakan ID siswa dari hasil pencarian
            'id_kelas' => $murid->id_kelas,
            'tanggal' => $request->tanggal,
            'id_kategori' => $request->id_kategori,
            'nominal' => $request->nominal,
        ]);

        // Perbarui nilai total berdasarkan kondisi
        $nilaiTotal = $request->id_kategori == 1 ? $transaksi->nominal : abs($transaksi->nominal);
        $transaksi->total = $nilaiTotal;
        $transaksi->save();

        // Proses tabungan (perbarui saldo, dll.) sesuai kebutuhan
        $this->processTabungan($transaksi);

        // Redirect ke halaman indeks dengan pesan sukses
        return redirect()->route('transaksi-tabungan.index')->with('success', 'Saldo berhasil ditambahkan');
    }

// Fungsi untuk mendapatkan total saldo siswa
private function getTotalSaldoForStudent($studentId)
{
    $totalPemasukkan = DB::table('transaksi_tabungan')
        ->where('id_kategori', 1) // nilai kategori pemasukkan
        ->where('id_siswa', $studentId)
        ->sum('nominal');

    $totalPengeluaran = DB::table('transaksi_tabungan')
        ->where('id_kategori', 2) // nilai kategori pengeluaran
        ->where('id_siswa', $studentId)
        ->sum('nominal');

    $totalSaldo = $totalPemasukkan - $totalPengeluaran;

    return $totalSaldo;
}

    // Fungsi untuk mendapatkan total pemasukkan
    public function getTotalPemasukkan()
    {
        $totalPemasukkan = DB::table('transaksi_tabungan')
            ->where('id_kategori', 1) // Filter hanya transaksi dengan kategori 1 yaitu pemasukkan
            ->sum('nominal');

        return $totalPemasukkan;
    }

    // Fungsi untuk mendapatkan total pengeluaran
    public function getTotalPengeluaran()
    {
        $totalPengeluaran = DB::table('transaksi_tabungan')
            ->where('id_kategori', 2) // nilai kategori pengeluaran
            ->sum('nominal');

        return $totalPengeluaran;
    }

    // Fungsi untuk mendapatkan total saldo saat ini
    public function getTotalSaldo()
    {
        $totalPemasukkan = DB::table('transaksi_tabungan')
            ->where('id_kategori', 1) // nilai kategori pemasukkan
            ->sum('nominal');

        $totalPengeluaran = DB::table('transaksi_tabungan')
            ->where('id_kategori', 2) //  nilai kategori pengeluaran
            ->sum('nominal');

        $totalSaldo = $totalPemasukkan - $totalPengeluaran;

        return $totalSaldo;
    }

    public function getUserDataById($id)
    {
        $userData = DB::table('transaksi_tabungan')
            ->join('murid', 'transaksi_tabungan.id_siswa', '=', 'murid.id')
            ->join('kelas', 'transaksi_tabungan.id_kelas', '=', 'kelas.id')
            ->select(
                'transaksi_tabungan.id',
                'transaksi_tabungan.id_siswa',
                'transaksi_tabungan.id_kelas',
                'murid.nisn_murid as nisn_murid',
                'murid.nama_murid as nama_murid',
                'kelas.ket_kelas as kelas',
                'kelas.id as kelas_id'
            )
            ->where('transaksi_tabungan.id_kelas', $id) // Ganti 'transaksi_tabungan.id_siswa' menjadi 'transaksi_tabungan.id_kelas'
            ->get(); // Gunakan get() untuk mendapatkan seluruh data yang sesuai
    
        return response()->json($userData);
    }
    

}
