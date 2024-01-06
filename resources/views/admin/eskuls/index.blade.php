@extends('admin.main')

@section('content')
    <div class="container">
        <h2>List of Eskuls</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
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
                        <td>{{ $eskul->id }}</td>
                        <td>{{ $eskul->subjudul }}</td>
                        <td>{{ $eskul->deskripsi }}</td>
                        <td><img src="{{ asset('uploads/' . $eskul->foto_tampilan) }}" alt="Foto Tampilan" width="50"></td>
                        <td><img src="{{ asset('uploads/' . $eskul->foto_dokumentasi1) }}" alt="Foto Dokumentasi 1" width="50"></td>
                        <td><img src="{{ asset('uploads/' . $eskul->foto_dokumentasi2) }}" alt="Foto Dokumentasi 2" width="50"></td>
                        <td>
                            <a href="{{ route('eskuls.show.eskul', $eskul->id) }}" class="btn btn-info">Show</a>
                            <a href="{{ route('eskuls.edit.eskul', $eskul->id) }}" class="btn btn-primary">Edit</a>
                            <button class="btn btn-danger" onclick="confirmDelete({{ $eskul->id }})">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- JavaScript Section -->
    <script>
        function confirmDelete(id) {
            if (confirm('Are you sure you want to delete this Eskul?')) {
                window.location.href = "{{ url('/eskuls') }}/" + id + "/delete";
            }
        }
    </script>
@endsection
