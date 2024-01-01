@extends('admin.main')

@section('content')
<div id="content" class="p-4 p-md-5 pt-5">
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Tambah Daftar Prestasi</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('all-prestasis.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="subjudul" class="form-label">Subjudul</label>
                    <input type="text" name="subjudul" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="foto_tampilan" class="form-label">Foto Tampilan</label>
                    <input type="file" name="foto_tampilan" class="form-control" accept="image/*" required>
                </div>

                <div class="mb-3">
                    <label for="foto_dokumentasi" class="form-label">Foto Dokumentasi</label>
                    <input type="file" name="foto_dokumentasi" class="form-control" accept="image/*" required>
                </div>

                <div class="d-flex justify-content-between align-items-center">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="/prestasis" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
@endsection
