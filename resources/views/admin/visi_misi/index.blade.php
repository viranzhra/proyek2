@extends('admin.main')

@section('content')
<div id="content" class="p-4 p-md-5 pt-5">
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2 class="h5">Data Visi Misi</h2>
            </div>
            <div class="card-body">
                <a href="{{ route('visi_misi.create') }}" class="btn btn-primary mb-3">Tambah Data</a>

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Judul Halaman</th>
                                <th scope="col">Visi</th>
                                <th scope="col">Misi</th>
                                <th scope="col">Tujuan</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($data as $item)
                            <tr>
                                <td>{{ $item->judul_halaman }}</td>
                                <td>{!! $item->visi !!}</td>
                                <td>{!! $item->misi !!}</td>
                                <td>{!! $item->tujuan !!}</td>
                                <td>
                                    <a href="{{ route('visi_misi.edit', $item->id) }}" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a>
                                    <form action="{{ route('visi_misi.destroy', $item->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">Tidak ada data visi misi.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
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
