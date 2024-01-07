@extends('admin.main')

@section('content')
<div id="content" class="p-4 p-md-5 pt-5">
    <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Guru - {{ $guru->nama_guru }}</h4>
            </div>
            <div class="card-body">

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('profil_guru.update', $guru->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="nama_guru" class="form-label">Nama Guru:</label>
                        <input type="text" class="form-control" id="nama_guru" name="nama_guru" value="{{ $guru->nama_guru }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="jabatan" class="form-label">Jabatan:</label>
                        <input type="text" class="form-control" id="jabatan" name="jabatan" value="{{ $guru->jabatan }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat:</label>
                        <textarea class="form-control" id="alamat" name="alamat" required>{{ $guru->alamat }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="foto_guru" class="form-label">Foto Guru:</label>
                        @if($guru->foto_guru)
                            <img src="{{ asset('storage/foto_guru/' . $guru->foto_guru) }}" alt="Foto Guru" class="img-fluid mb-2" style="max-width: 100px;">
                        @else
                            Belum ada foto
                        @endif
                        <input type="file" class="form-control-file" id="foto_guru" name="foto_guru">
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-between">
                        <button type="submit" class="btn btn-primary me-md-2">Simpan</button>
                        <a href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
