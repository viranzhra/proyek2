@extends('admin.main')

@section('content')
    <!-- Page Content  -->
<div id="content" class="p-4 p-md-5 pt-5">
<div class="container">
    <h2>Tambah Prestasi</h2>
    <form method="post" action="{{ route('prestasis.store') }}" enctype="multipart/form-data">
        @csrf
        <label for="judul_utama">Judul Utama:</label>
        <input type="text" name="judul_utama" required>
        <br>
        <label for="gambar_utama">Gambar Utama:</label>
        <input type="file" name="gambar_utama" required>
        <br>
        <button type="submit">Simpan</button>
    </form>
</div>
</div>
@endsection

