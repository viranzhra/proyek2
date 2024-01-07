@extends('admin.main')

@section('content')
<div id="content" class="p-4 p-md-5 pt-5">
    <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Esktrakurikuler</h3>
            </div>
            <div class="card-body">

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="mb-3">
                    <a href="{{ route('eskuls.create') }}" class="btn btn-primary">Tambah Data</a>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>Subjudul</th>
                                <th>Deskripsi</th>
                                <th>Foto Tampilan</th>
                                <th>Foto Dokumentasi 1</th>
                                <th>Foto Dokumentasi 2</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($eskuls as $eskul)
                                <tr>
                                    <td>{{ $eskul->subjudul }}</td>
                                    <td>{!! $eskul->deskripsi !!}</td>
                                    <td><img src="{{ asset('uploads/' . $eskul->foto_tampilan) }}" alt="Foto Tampilan" width="50"></td>
                                    <td><img src="{{ asset('uploads/' . $eskul->foto_dokumentasi1) }}" alt="Foto Dokumentasi 1" width="50"></td>
                                    <td><img src="{{ asset('uploads/' . $eskul->foto_dokumentasi2) }}" alt="Foto Dokumentasi 2" width="50"></td>
                                    <td>
                                        <a href="{{ route('eskuls.edit.eskul', $eskul->id) }}" class="btn btn-success"><i class="fas fa-edit"></i></a>
                                        <button class="btn btn-danger" onclick="confirmDelete({{ $eskul->id }})"><i class="fas fa-trash-alt"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Pagination Links -->
                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                        <div class="text-muted mb-2">
                            Showing {{ $eskuls->firstItem() }} to {{ $eskuls->lastItem() }} of {{ $eskuls->total() }} results
                        </div>
                        <div class="mb-2">
                            {{ $eskuls->links() }}
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
    <!-- JavaScript Section -->
    <script>
        function confirmDelete(id) {
            if (confirm('Apakah anda yakin ingin menghapus eskul ini?')) {
                window.location.href = "{{ url('/eskuls') }}/" + id + "/delete";
            }
        }
    </script>
@endsection
