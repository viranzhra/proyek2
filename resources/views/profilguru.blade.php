@extends('layout.tampilan')

@section('content')

<style>
    .guru-card {
        background-color: #9dc0df;
        border-radius: 20px;
        margin-bottom: 20px;
        overflow: hidden;
    }

    .guru-img {
        width: 100%;
        height: auto;
        max-height: 350px;
        padding: 10px;
        border-radius: 20px;
        object-fit: cover;
    }

    .guru-card-body {
        padding: 15px;
    }

    .card-title-divider {
        border-radius: 5px;
        border-top: 3px solid #000;
    }
</style>

<main>
    <div class="container text-center">
        <div class="content">
            <h4 style="margin-top: 100px; margin-bottom: 50px; color: #69699c; font-weight: bold;">
                PROFIL KEPALA SEKOLAH & GURU <br />
                {{ $sekolah->nama }}
            </h4>
            <hr style="border: none; border-top: 5px solid #1623a9; margin-top: -30px; border-radius: 5px;">
        </div>
    </div>

        <div class="container">
            <div class="row">
                @if($profilKepsek)
                    <div class="col-md-4" style="margin-bottom: 10px">
                        <div class="card" style="border: 1px solid #ddd; background-color: #9dc0df; border-radius: 25px;">
                            @if($profilKepsek->foto_kepsek)
                                <img src="{{ asset('storage/foto_kepsek/' . $profilKepsek->foto_kepsek) }}" class="card-img-top"
                                    alt="Foto Kepsek" style="width: 100%; border-radius: 25px; padding: 10px;">
                            @else
                                <p class="text-center mt-3">Data Kepala Sekolah tidak tersedia.</p>
                            @endif
                            <div class="card-body">
                                <h5 class="card-title"><b>KEPALA SEKOLAH</b></h5>
                                <hr class="card-title-divider">
                                <p class="card-text"><b>Nama :</b> {{ $profilKepsek->nama_kepsek }}</p>
                                <p class="card-text"><b>Alamat :</b> {{ $profilKepsek->alamat }}</p>
                            </div>
                        </div>
                    </div>
        
                    <div class="col-md-8">
                        <div class="card" style="border: none; background-color: #E3F2FD; border-radius: 25px; height: 100%;">
                            @if($profilKepsek->foto_bersama)
                            <h5 class="card-title" style="margin: 15px; text-align:center"><b>FOTO KEPALA SEKOLAH & GURU</b></h5>
                            <hr class="card-title-divider" style="width: 50%; margin: 0 auto;">
                                <img src="{{ asset('storage/foto_bersama/' . $profilKepsek->foto_bersama) }}" class="card-img-top"
                                    alt="Foto tidak tersedia" style="width: 100%; max-width: 600px; border-radius: 25px; padding: 10px; margin: 0 auto; max-height: 350px;">
                            @else
                                <p class="text-center mt-3"></p>
                            @endif
                        </div>
                    </div>
                @else
                    <div class="col-md-12 text-center">
                        <p>Data Kepala Sekolah tidak ada.</p>
                    </div>
                @endif
            </div>
            <br />
        </div>
        
    {{-- Daftar guru --}}
    <div class="row">
        @forelse($gurus as $guru)
            <div class="col-md-4">
                <div class="card guru-card">
                    @if($guru->foto_guru)
                        <img src="{{ asset('storage/foto_guru/' . $guru->foto_guru) }}" alt="Foto Guru" class="card-img-top guru-img">
                    @else
                        <p class="guru-img">Belum ada foto</p>
                    @endif
                    <div class="card-body guru-card-body">
                        <h5 class="card-title" style="font-weight: bold; text-align:center">{{ $guru->nama_guru }}</h5>
                        <hr class="card-title-divider">
                        <p class="card-text"><b>Jabatan :</b> {{ $guru->jabatan }}</p>
                        <p class="card-text"><b>Alamat :</b> {{ $guru->alamat }}</p>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-md-12 text-center">
                <p>Data guru tidak tersedia.</p>
            </div>
        @endforelse
    </div>

    </div>
</main>
@endsection
