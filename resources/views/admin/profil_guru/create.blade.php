@extends('admin.main')

@section('content')
<div id="content" class="p-4 p-md-5 pt-5">
    <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tambah Data Guru</h3>
            </div>
            <div class="card-body">

                @if($errors->any())
                    <div class="alert alert-danger mt-3">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('profil_guru.store') }}" method="post" enctype="multipart/form-data" class="mt-3">
                    @csrf
                    <div class="mb-3">
                        <label for="nama_guru" class="form-label">Nama Guru:</label>
                        <input type="text" class="form-control" id="nama_guru" name="nama_guru" placeholder="Masukkan nama" required>
                    </div>

                    <div class="mb-3">
                        <label for="jabatan" class="form-label">Jabatan:</label>
                        <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Masukkan jabatan" required>
                    </div>

                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat:</label>
                        <textarea class="form-control" id="alamat" name="alamat" placeholder="Masukkan alamat" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="foto_guru" class="form-label">Foto Guru:</label>
                        <input type="file" class="form-control-file" id="foto_guru" name="foto_guru">
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-between">
                        <button type="submit" class="btn btn-primary me-md-2">Simpan Perubahan</button>
                        <a href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
