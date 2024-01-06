@extends('admin.main')

@section('content')
    <div class="container">
        <h2>Tambah Eskul</h2>
        <form action="{{ route('eskuls.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="subjudul">Subjudul:</label>
                <input type="text" name="subjudul" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi:</label>
                <textarea name="deskripsi" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="foto_tampilan">Foto Tampilan:</label>
                <input type="file" name="foto_tampilan" class="form-control-file" accept="image/*" required>
            </div>
            <div class="form-group">
                <label for="foto_dokumentasi1">Foto Dokumentasi 1:</label>
                <input type="file" name="foto_dokumentasi1" class="form-control-file" accept="image/*">
            </div>
            <div class="form-group">
                <label for="foto_dokumentasi2">Foto Dokumentasi 2:</label>
                <input type="file" name="foto_dokumentasi2" class="form-control-file" accept="image/*">
            </div>
            <button type="submit" class="btn btn-primary">Tambah Eskul</button>
        </form>
    </div>
@endsection
