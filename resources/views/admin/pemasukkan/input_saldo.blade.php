<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Transaksi Tabungan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
                    <input type="hidden" id="nama_murid" name="nama_murid">
                </div>

                <div class="col-md-6">
                    <label for="tanggal" class="form-label">Tanggal Transaksi</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                </div>

                <div class="col-md-6">
                    <label for="id_kategori" class="form-label">Kategori Transaksi</label>
                    <select class="form-select" id="id_kategori" name="id_kategori" required>
                        <option value="" disabled selected>Pilih Kategori</option>
                        @foreach($kategoriTransaksis as $kategori)
                            <option value="{{ $kategori->id }}">{{ $kategori->deskripsi }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6">
                    <label for="nominal" class="form-label">Nominal</label>
                    <div class="input-group">
                        <span class="input-group-text">Rp</span>
                        <input type="number" class="form-control" id="nominal" name="nominal" step="0.01" required>
                    </div>
                    <small id="nominalHelp" class="form-text text-muted">Contoh: 10.000</small>
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

<script>
    $(document).ready(function () {
        // Saat memilih murid
        $('#id_siswa').change(function () {
            // Mengambil ID murid yang dipilih
            var muridId = $(this).val();

            // Mengirim permintaan AJAX untuk mendapatkan nama murid berdasarkan ID
            $.get('/get-murid-name/' + muridId, function (data) {
                // Mengisikan nama murid ke dalam input field
                $('#nama_murid').val(data.nama_murid);
            });
        });

        // Saat formulir berhasil disubmit
        $('form').submit(function (e) {
            // Menghentikan aksi formulir bawaan
            e.preventDefault();
            // Arahkan pengguna ke halaman tujuan
            window.location.href = "{{ route('transaksi-tabungan.index') }}";
        });
    });
</script>


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
