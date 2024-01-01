@extends('admin.main')

@section('content')
<div class="container">
    <h2>All Prestasis</h2>
    <a href="{{ route('all-prestasis.create') }}" class="btn btn-success mb-3">Tambah All Prestasi</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Subjudul</th>
                <th>Deskripsi</th>
                <th>Foto Tampilan</th>
                <th>Foto Dokumentasi</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($allPrestasis as $allPrestasi)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $allPrestasi->subjudul }}</td>
                    <td>{{ $allPrestasi->deskripsi }}</td>
                    <td>
                        <img src="{{ asset('images/' . $allPrestasi->foto_tampilan) }}" alt="Foto Tampilan" style="max-width: 100px; max-height: 100px;">
                    </td>
                    <td>
                        <img src="{{ asset('images/' . $allPrestasi->foto_dokumentasi) }}" alt="Foto Dokumentasi" style="max-width: 100px; max-height: 100px;">
                    </td>
                    <td>
                        <a href="{{ route('all-prestasis.edit', $allPrestasi->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('all-prestasis.destroy', $allPrestasi->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="container">
    @if($allPrestasis->count() > 0)
        @foreach($allPrestasis as $allPrestasi)
            <div class="d-flex position-relative">
                {{-- gambar tampilan --}}
                <img
                    src="{{ asset('images/' . $allPrestasi->foto_tampilan) }}"
                    class="flex-shrink-0 me-3"
                    alt="#"
                    style="width: 300px; border-radius: 25px"
                />
                <div
                    class="col-xl-6 col-lg-6 col-md-6"
                    style="
                        border: 1px solid #ddd;
                        background-color: #9dc0df;
                        border-radius: 25px;
                        width: 800px;
                    "
                >
                    <h5
                        class="mt-0"
                        style="margin-top: 200px; margin-left: 10px; padding: 20px"
                    >
                        {{ $allPrestasi->subjudul }}
                    </h5>
                    <p style="margin-left: 10px; padding: 20px">
                        {{ $allPrestasi->deskripsi }}
                    </p>
                    <a
                        href="/isiprestasi"
                        class="btn btn-primary"
                        style="
                            float: right;
                            margin-bottom: 15px;
                            margin-right: 20px;
                            background-color: #215382;
                            font-weight: bold;
                            border-radius: 20px;
                        "
                        >Selengkapnya</a
                    >
                </div>
            </div>
            <br /><br />
        @endforeach
    @else
        <p>Tidak ada data prestasi.</p>
    @endif
</div>
@endsection