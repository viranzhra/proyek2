@extends('admin.main')

@section('content')
    <!-- Page Content  -->
    <div id="content" class="p-4 p-md-5 pt-5">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h2>Edit Prestasi</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('prestasis.update', $prestasi->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-3">
                            <label for="judul_utama" class="form-label">Judul Utama:</label>
                            <input type="text" class="form-control" name="judul_utama" value="{{ $prestasi->judul_utama }}" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="gambar_utama" class="form-label">Gambar Utama:</label>
                            <!-- Ganti input type menjadi file -->
                            <input type="file" class="form-control" name="gambar_utama" accept="image/*">
                            <!-- Menampilkan nama file gambar yang sudah ada -->
                            @if($prestasi->gambar_utama)
                                <p class="mt-2">File Gambar Utama Saat Ini: {{ $prestasi->gambar_utama }}</p>
                            @endif
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        
                        <!-- Tombol Kembali -->
                        <a href="{{ route('prestasis.index') }}" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
