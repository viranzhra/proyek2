@extends('admin.main')

@section('content')
<div id="content" class="p-4 p-md-5 pt-5">
<div class="container">
    <div class="card">
        <div class="card-header" style="background-color: #2c8fe5;
        color: aliceblue;">
            <h4>Edit Daftar Prestasi</h4>
        </div>
        <div class="card-body" style="background-color:#fafafa">
            <form action="{{ route('all-prestasis.update', ['allPrestasi' => $allPrestasi->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="subjudul" class="form-label">Subjudul</label>
                    <input type="text" name="subjudul" class="form-control" value="{{ $allPrestasi->subjudul }}" required>
                </div>

                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" required>{{ $allPrestasi->deskripsi }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="foto_tampilan" class="form-label">Foto Tampilan</label>
                    <input type="file" name="foto_tampilan" class="form-control" accept="image/*">
                    @if($allPrestasi->foto_tampilan)
                        <p>File Foto Tampilan Saat Ini: {{ $allPrestasi->foto_tampilan }}</p>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="foto_dokumentasi" class="form-label">Foto Dokumentasi</label>
                    <input type="file" name="foto_dokumentasi" class="form-control" accept="image/*">
                    @if($allPrestasi->foto_dokumentasi)
                        <p>File Foto Dokumentasi Saat Ini: {{ $allPrestasi->foto_dokumentasi }}</p>
                    @endif
                </div>

                <div class="d-flex justify-content-between align-items-center">
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    <a href="/prestasis" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
@endsection
