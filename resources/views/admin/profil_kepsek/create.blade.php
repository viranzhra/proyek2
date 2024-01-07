@extends('admin.main')

@section('content')
<div id="content" class="p-4 p-md-5 pt-5">
    <div class="card">
            <div class="card-header">
                <h3>Tambah Data Kepala Sekolah</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('profil_kepsek.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="nama_kepsek" class="form-label">Nama Kepala Sekolah</label>
                        <input type="text" class="form-control" id="nama_kepsek" name="nama_kepsek" placeholder="Masukkan nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat" placeholder="Masukkan alamat" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="foto_kepsek" class="form-label">Foto Kepala Sekolah</label>
                        <input type="file" class="form-control" id="foto_kepsek" name="foto_kepsek" accept="image/*" required>
                    </div>
                    <div class="mb-3">
                        <label for="foto_bersama" class="form-label">Foto Bersama (Opsional)</label>
                        <input type="file" class="form-control" id="foto_bersama" name="foto_bersama" accept="image/*">
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-between">
                        <button type="submit" class="btn btn-primary me-md-2">Simpan</button>
                        <a href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
