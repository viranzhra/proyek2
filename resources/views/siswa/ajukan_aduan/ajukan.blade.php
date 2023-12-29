@extends('layout.main')

@section('content')
<style>
    body{
        background-color: #cacaca;
        background-image: none;
    }
  </style>
<div class="container" style="margin-top: 40px; margin-bottom: -20px; max-width: 1100px;">
    <div id="content" class="p-4 p-md-5 pt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card border" style="background-color: rgb(255 255 255 / 46%)">
                    <div class="card-header" style="background-color: #969696;
                    font-weight: bold;
                    color: #ffffff;">
                        <h5 class="card-title text-center">FORMULIR ADUAN SISWA</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('form.aduan.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label style="font-weight: bold" for="id_siswa" class="form-label">Nama Murid</label>
                                <select class="form-select" id="id_siswa" name="id_siswa" required style="border-radius: 25px;">
                                    <option value="" disabled selected>Pilih Nama Siswa</option>
                                    @foreach($murids as $murid)
                                        <option value="{{ $murid->id }}">{{ $murid->nama_murid }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label style="font-weight: bold" for="edit_kelas">Kelas:</label>
                                <select id="edit_kelas" name="id_kelas" class="form-select" style="border-radius: 25px;">
                                    <option value="" disabled selected>Pilih Kelas</option>
                                    @foreach($kelas as $kelasItem)
                                    <option value="{{ $kelasItem->id }}" {{ isset($pemasukkan->id_kelas) && $pemasukkan->id_kelas == $kelasItem->id ? 'selected' : '' }}>
                                        {{ $kelasItem->ket_kelas }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label style="font-weight: bold" for="kategori_aduan" class="form-label">Kategori Aduan :</label>
                                <select class="form-select" id="kategori_aduan" name="kategori_aduan" required style="border-radius: 25px;">
                                    <option value="" disabled selected>Pilih Kategori Aduan</option>
                                    @foreach($kategoriAduan as $kategori)
                                        <option value="{{ $kategori->id }}">{{ $kategori->ket_aduan }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label style="font-weight: bold" for="aduan" class="form-label">Isi Aduan :</label>
                                <textarea class="form-control" id="aduan" name="aduan" rows="4" placeholder="Tuliskan aduan Anda" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label style="font-weight: bold" for="bukti" class="form-label">Bukti Aduan :</label>
                                <input type="file" class="form-control" id="bukti" name="bukti_aduan" rows="4" placeholder="Tuliskan aduan Anda" required></input>
                            </div>
                            <button type="submit" class="btn btn-primary">Kirim Aduan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: '{{ session('success') }}',
        });
    @endif
</script>
@endsection
