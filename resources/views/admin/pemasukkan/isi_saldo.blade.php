<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Transaksi Tabungan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Tambahkan skrip ini untuk menangani dropdown kelas dinamis --}}
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function () {
            // Ketika dropdown murid berubah
            $('#id_siswa').change(function () {
                // Dapatkan ID murid yang dipilih
                var studentId = $(this).val();

                // Ambil kelas yang sesuai untuk murid yang dipilih menggunakan AJAX
                $.ajax({
                    url: "{{ route('transaksi-tabungan.getClassByStudent') }}",
                    method: 'GET',
                    data: { studentId: studentId },
                    success: function (response) {
                        // Setel nilai dropdown kelas dan buat menjadi readonly
                        $('#pilihkelas').val(response.id_kelas).prop('readonly', true);
                    },
                    error: function (error) {
                        console.log('Error fetching class: ' + error);
                    }
                });
            });
        });
    </script>
    
</head>
<body>

<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Tambah Transaksi Tabungan</h4>
        </div>
        <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-danger mb-5">
                <h5 class="alert-heading">Waduh! Terjadi kesalahan dengan input kamu.</h5>
                <ul class="list-group">
                    @foreach ($errors->all() as $error)
                        <li class="list-group-item">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form method="post" action="{{ route('transaksi-tabungan.store') }}" class="row g-3">
                @csrf

                <div class="col-md-6">
                    <label for="id_siswa" class="form-label">Nama Murid</label>
                    <select class="form-select" id="id_siswa" name="id_siswa" required>
                        <option value="" disabled selected>Pilih Nama Siswa</option>
                        @foreach($murids as $murid)
                            <option value="{{ $murid->id }}">{{ $murid->nama_murid }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6">
                    <label for="pilihkelas">Kelas</label>
                    <select class="form-control" id="pilihkelas" name="id_kelas" required readonly>
                        <option value="" disabled selected>Pilih Kelas</option>
                        @foreach ($kelas as $kelasItem)
                            <option value="{{ $kelasItem->id }}">{{ $kelasItem->ket_kelas }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6">
                    <label for="id_kategori" class="form-label">Deskripsi</label>
                    <select class="form-select" id="id_kategori" name="id_kategori" required>
                        <option value="" disabled selected>Pilih Kategori</option>
                        @foreach($kategoriTransaksis as $kategori)
                            <option value="{{ $kategori->id }}">{{ $kategori->deskripsi }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6">
                    <label for="tanggal" class="form-label">Tanggal Transaksi</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                </div>

                <div class="col-md-6">
                    <label for="nominal" class="form-label">Nominal</label>
                    <div class="input-group">
                        <span class="input-group-text">Rp</span>
                        <input type="number" class="form-control" id="nominal" name="nominal" step="0.01" required>
                    </div>
                    <small id="nominalHelp" class="form-text text-muted">Contoh: 10000</small>
                </div>

                <div class="col-12 mt-3">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('transaksi-tabungan.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

{{-- <script>
    $(document).ready(function () {
        // Saat formulir berhasil disubmit
        $('form').submit(function (e) {
            // Menghentikan aksi formulir bawaan
            e.preventDefault();
            // Arahkan pengguna ke halaman tujuan
            window.location.href = "{{ route('transaksi-tabungan.index') }}";
        });
    });
</script> --}}

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZX..."></script>

</body>
</html>

<!-- Modal Tambah Data -->
<div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahModalLabel">Tambah Data Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form tambah data siswa -->
                <form action="{{ route('siswa.store') }}" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="id_siswa" class="form-label">Nama Murid</label>
                        <select class="form-select" id="id_siswa" name="id_siswa" required>
                            <option value="" disabled selected>Pilih Nama Siswa</option>
                            @foreach($murids as $murid)
                                <option value="{{ $murid->id }}">{{ $murid->nama_murid }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="pilihkelas">Kelas</label>
                        <select class="form-control" id="pilihkelas" name="id_kelas" required readonly>
                            <option value="" disabled selected>Pilih Kelas</option>
                            @foreach ($kelas as $kelasItem)
                                <option value="{{ $kelasItem->id }}">{{ $kelasItem->ket_kelas }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="id_kategori" class="form-label">Deskripsi</label>
                        <select class="form-select" id="id_kategori" name="id_kategori" required>
                            <option value="" disabled selected>Pilih Kategori</option>
                            @foreach($kategoriTransaksis as $kategori)
                                <option value="{{ $kategori->id }}">{{ $kategori->deskripsi }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="tanggal" class="form-label">Tanggal Transaksi</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                    </div>

                    <div class="form-group">
                        <label for="nominal" class="form-label">Nominal</label>
                        <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="number" class="form-control" id="nominal" name="nominal" step="0.01" required>
                        </div>
                        <small id="nominalHelp" class="form-text text-muted">Contoh: 10000</small>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
