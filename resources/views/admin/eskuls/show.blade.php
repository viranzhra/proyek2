@extends('admin.main')

@section('content')
    <div class="container">
        <h2>Detail Eskul</h2>
        <p><strong>Subjudul:</strong> {{ $eskul->subjudul }}</p>
        <p><strong>Deskripsi:</strong> {{ $eskul->deskripsi }}</p>
        <p><strong>Foto Tampilan:</strong> <img src="{{ asset('uploads/' . $eskul->foto_tampilan) }}" alt="Foto Tampilan"></p>
        <p><strong>Foto Dokumentasi 1:</strong> <img src="{{ asset('uploads/' . $eskul->foto_dokumentasi1) }}" alt="Foto Dokumentasi 1"></p>
        <p><strong>Foto Dokumentasi 2:</strong> <img src="{{ asset('uploads/' . $eskul->foto_dokumentasi2) }}" alt="Foto Dokumentasi 2"></p>
    </div>
@endsection
