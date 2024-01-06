@extends('admin.main')

@section('content')
    <!-- Page Content  -->
    <div id="content" class="p-4 p-md-5 pt-5">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h2 class="card-title mb-0">Tambah Prestasi</h2>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('prestasis.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="judul_utama" class="form-label">Judul Utama:</label>
                            <input type="text" class="form-control" id="judul_utama" name="judul_utama">
                        </div>

                        <div class="mb-3">
                            <label for="gambar_utama" class="form-label">Gambar Utama:</label>
                            <input type="file" class="form-control" id="gambar_utama" name="gambar_utama" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('prestasis.index') }}" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
