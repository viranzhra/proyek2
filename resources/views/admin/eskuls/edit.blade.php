@extends('admin.main')

@section('content')
    <div class="container">
        <h2>Edit Eskul</h2>
        <form action="{{ route('eskuls.update', $eskul->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="subjudul">Subjudul:</label>
                <input type="text" name="subjudul" class="form-control" value="{{ $eskul->subjudul }}" required>
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi:</label>
                <textarea name="deskripsi" class="form-control" required>{{ $eskul->deskripsi }}</textarea>
            </div>
            <div class="form-group">
                <label for="foto_tampilan">Foto Tampilan:</label>
                <input type="file" name="foto_tampilan" class="form-control-file" accept="image/*">
            </div>
            <div class="form-group">
                <label for="foto_dokumentasi1">Foto Dokumentasi 1:</label>
                <input type="file" name="foto_dokumentasi1" class="form-control-file" accept="image/*">
            </div>
            <div class="form-group">
                <label for="foto_dokumentasi2">Foto Dokumentasi 2:</label>
                <input type="file" name="foto_dokumentasi2" class="form-control-file" accept="image/*">
            </div>
            <button type="submit" class="btn btn-primary">Update Eskul</button>
        </form>
    </div>
@endsection
