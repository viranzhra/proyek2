@extends('admin.main')

@section('content')
<div id="content" class="p-4 p-md-5 pt-5">
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>{{ isset($data) ? 'Edit' : 'Tambah' }} Data Visi Misi</h2>
            </div>
            <div class="card-body">
                @if(isset($data))
                    <form action="{{ route('visi_misi.update', $data->id) }}" method="POST">
                        @method('PUT')
                @else
                    <form action="{{ route('visi_misi.store') }}" method="POST">
                @endif
                        @csrf

                        <div class="form-group">
                            <label for="judul_halaman">Judul Halaman:</label>
                            <input type="text" class="form-control" id="judul_halaman" name="judul_halaman" placeholder="Masukkan Judul Halaman" value="{{ isset($data) ? $data->judul_halaman : old('judul_halaman') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="visi">Visi:</label>
                            <textarea placeholder="Masukkan Visi" class="form-control" id="visi" name="visi" rows="3" required>{{ isset($data) ? $data->visi : old('visi') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="misi">Misi:</label>
                            <textarea placeholder="Masukkan Misi" class="form-control" id="misi" name="misi" rows="3" required>{{ isset($data) ? $data->misi : old('misi') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="tujuan">Tujuan:</label>
                            <textarea placeholder="Masukkan Tujuan" class="form-control" id="tujuan" name="tujuan" rows="3" required>{{ isset($data) ? $data->tujuan : old('tujuan') }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                        
                        <a href="{{ route('visi_misi.index') }}" class="btn btn-secondary">Kembali</a>
                    
                    </form>
            </div>
        </div>
    </div>
</div>
@endsection
