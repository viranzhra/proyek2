@extends('admin.main')

@section('content')
<div id="content" class="p-4 p-md-5 pt-5">
    <div class="card">
            <div class="card-header">
                <h2>Edit Data Profil Kepala Sekolah</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('profil_kepsek.update', $profilKepsek->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="nama_kepsek" class="form-label">Nama Kepala Sekolah</label>
                        <input type="text" class="form-control" id="nama_kepsek" name="nama_kepsek" value="{{ $profilKepsek->nama_kepsek }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat" required>{{ $profilKepsek->alamat }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="foto_kepsek" class="form-label">Foto Kepala Sekolah</label>
                        <input type="file" class="form-control" id="foto_kepsek" name="foto_kepsek" accept="image/*">
                        @if($profilKepsek->foto_kepsek)
                            <img src="{{ asset('storage/foto_kepsek/' . $profilKepsek->foto_kepsek) }}" alt="Foto Kepsek" style="width: 100px;">
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="foto_bersama" class="form-label">Foto Bersama (Opsional)</label>
                        <input type="file" class="form-control" id="foto_bersama" name="foto_bersama" accept="image/*">
                        @if($profilKepsek->foto_bersama)
                            <img src="{{ asset('storage/foto_bersama/' . $profilKepsek->foto_bersama) }}" alt="Foto Bersama" style="width: 100px;">
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    <a href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
@endsection
