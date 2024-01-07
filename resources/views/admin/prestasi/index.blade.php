@extends('admin.main')

@section('content')
    <!-- Page Content  -->
    <div id="content" class="p-4 p-md-5 pt-5">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h2 class="h5">Judul Halaman Prestasi</h2>
                </div>
                <div class="card-body">
                    <a href="{{ route('prestasis.create') }}" class="btn btn-primary">Tambah</a><br><br>
                    @if(session('success-judul-utama'))
                        <div class="alert alert-success">
                            {{ session('success-judul-utama') }}
                        </div>
                    @endif
                    <div class="table-responsive">
                        @if($prestasis && $prestasis->count() > 0)
                            <table class="table table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Judul Utama</th>
                                        <th scope="col">Gambar Utama</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($prestasis as $prestasi)
                                        <tr>
                                            <td>{{ $prestasi->judul_utama }}</td>
                                            <td>
                                                @if($prestasi->gambar_utama)
                                                    <img src="{{ asset('images/' . $prestasi->gambar_utama) }}" alt="Gambar Utama" class="img-thumbnail" style="max-width: 100px;">
                                                @else
                                                    Tidak ada gambar
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('prestasis.edit', $prestasi->id) }}" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a>
                                                <form action="{{ route('prestasis.destroy', $prestasi->id) }}" method="post" style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus?')"><i class="fas fa-trash-alt"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p>Data tidak tersedia.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div><br>
        
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h2 class="h5">Daftar Prestasi</h2>
                </div>
                <div class="card-body">
                    <a href="{{ route('all-prestasis.create') }}" class="btn btn-primary mb-3">Tambah Prestasi</a>
        
                    @if(session('success-daftar-prestasi'))
                        <div class="alert alert-success">
                            {{ session('success-daftar-prestasi') }}
                        </div>
                    @endif
                    <div class="table-responsive">
                        @if($allPrestasis && $allPrestasis->count() > 0)
                            <table class="table table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Subjudul</th>
                                        <th scope="col">Deskripsi</th>
                                        <th scope="col">Foto Tampilan</th>
                                        <th scope="col">Foto Dokumentasi</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($allPrestasis as $allPrestasi)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $allPrestasi->subjudul }}</td>
                                            <td>{!! $allPrestasi->deskripsi !!}</td>
                                            <td>
                                                <img src="{{ asset('images/' . $allPrestasi->foto_tampilan) }}" alt="Foto Tampilan" class="img-thumbnail" style="max-width: 100px; max-height: 100px;">
                                            </td>
                                            <td>
                                                <img src="{{ asset('images/' . $allPrestasi->foto_dokumentasi) }}" alt="Foto Dokumentasi" class="img-thumbnail" style="max-width: 100px; max-height: 100px;">
                                            </td>
                                            <td>
                                                <a href="{{ route('all-prestasis.edit', $allPrestasi->id) }}" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a>
                                                <form action="{{ route('all-prestasis.destroy', $allPrestasi->id) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus?')"><i class="fas fa-trash-alt"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p>Data tidak tersedia.</p>
                        @endif
                    <!-- Menampilkan informasi paginasi -->
                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                        <div class="text-muted mb-2">
                            Showing {{ $allPrestasis->firstItem() }} to {{ $allPrestasis->lastItem() }} of {{ $allPrestasis->total() }} results
                        </div>
                        <div class="mb-2">
                            {{ $allPrestasis->links() }}
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>        
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.19.0/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <script>
        // Automatically hide any alert after 3 seconds
        setTimeout(function() {
            document.querySelectorAll('.alert').forEach(function(alert) {
                alert.style.display = 'none';
            });
        }, 3000);
      </script>
@endsection
