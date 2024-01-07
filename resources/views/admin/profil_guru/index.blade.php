@extends('admin.main')

@section('content')
<div id="content" class="p-4 p-md-5 pt-5">
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4>Data Kepala Sekolah</h4>
            </div>
            <div class="card-body">
                <a href="/profil_kepsek" class="btn btn-primary mb-3">Tambah Data</a>
                @if(session('success-kepsek'))
                    <div class="alert alert-success">
                        {{ session('success-kepsek') }}
                    </div>
                @endif
                <div class="table-responsive">
                    @if(count($profilKepsek) > 0)
                        <table class="table table-bordered table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Nama Kepala Sekolah</th>
                                    <th>Alamat</th>
                                    <th>Foto Kepala Sekolah</th>
                                    <th>Foto Bersama</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($profilKepsek as $kepsek)
                                    <tr>
                                        <td>{{ $kepsek->nama_kepsek }}</td>
                                        <td>{{ $kepsek->alamat }}</td>
                                        <td>
                                            @if($kepsek->foto_kepsek)
                                                <img src="{{ asset('storage/foto_kepsek/' . $kepsek->foto_kepsek) }}" alt="Foto Kepsek" style="width: 100px;">
                                            @else
                                                Belum ada foto
                                            @endif
                                        </td>
                                        <td>
                                            @if($kepsek->foto_bersama)
                                                <img src="{{ asset('storage/foto_bersama/' . $kepsek->foto_bersama) }}" alt="Foto Bersama" style="width: 100px;">
                                            @else
                                                Belum ada foto
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('profil_kepsek.edit', $kepsek->id) }}" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a>
                                            <form action="{{ route('profil_kepsek.destroy', $kepsek->id) }}" method="post" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="fas fa-trash-alt"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>Data Kepala Sekolah Tidak Ada</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    
    <br><br>
    <div id="container">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Daftar Guru</h4>
            </div>
            <div class="card-body">
                <a href="{{ route('profil_guru.create') }}" class="btn btn-primary" style="margin-bottom: 10px">Tambah Guru</a>
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if($gurus->isEmpty())
                    <p>Data Guru tidak ada.</p>
                @else
                    <table class="table table-bordered table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th>Nama Guru</th>
                                <th>Jabatan</th>
                                <th>Alamat</th>
                                <th>Foto Guru</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($gurus as $index => $guru)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $guru->nama_guru }}</td>
                                    <td>{{ $guru->jabatan }}</td>
                                    <td>{{ $guru->alamat }}</td>
                                    <td>
                                        @if($guru->foto_guru)
                                            <img src="{{ asset('storage/foto_guru/' . $guru->foto_guru) }}" alt="Foto Guru" width="50">
                                        @else
                                            Belum ada foto
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('profil_guru.edit', $guru->id) }}" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a>
                                        <form action="{{ route('profil_guru.destroy', $guru->id) }}" method="post" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data guru ini?')"><i class="fas fa-trash-alt"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                        <div class="text-muted mb-2">
                            Showing {{ $gurus->firstItem() }} to {{ $gurus->lastItem() }} of {{ $gurus->total() }} results
                        </div>
                        <div class="mb-2">
                            {{ $gurus->links() }}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<script>
    // Automatically hide any alert after 3 seconds
    setTimeout(function() {
        document.querySelectorAll('.alert').forEach(function(alert) {
            alert.style.display = 'none';
        });
    }, 3000);
  </script>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.19.0/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
@endsection
