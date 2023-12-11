<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pemasukkan Tabungan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Tambah Pemasukkan Tabungan</h4>
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('pemasukkan.store') }}" class="row g-3">
                @csrf

                <div class="col-md-6">
                    <label for="id_siswa" class="form-label">Nama Murid</label>
                    <select class="form-select" id="id_siswa" name="id_siswa" required>
                        @foreach($murids as $murid)
                            <option value="{{ $murid->id }}">{{ $murid->nama_murid }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6">
                    <label for="tanggal_pemasukkan" class="form-label">Tanggal Pemasukkan</label>
                    <input type="date" class="form-control" id="tanggal_pemasukkan" name="tanggal_pemasukkan" required>
                </div>

                <div class="col-md-6">
                    <label for="nominal" class="form-label">Nominal</label>
                    <div class="input-group">
                        <span class="input-group-text">Rp</span>
                        <input type="number" class="form-control" id="nominal" name="nominal" step="0.01" required>
                        <span class="input-group-text">.00</span>
                    </div>
                    <small id="nominalHelp" class="form-text text-muted">Example: 10.000</small>
                </div>

                <div class="col-12 mt-3">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="/pemasukkan-tabungan" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    // Fungsi ini akan dijalankan setelah halaman sepenuhnya dimuat
    $(document).ready(function () {
        // Saat formulir berhasil disubmit
        $('form').submit(function () {
            // Arahkan pengguna ke halaman sebelumnya
            window.history.back();
        });
    });
</script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZX..."></script>
