@extends('layout.main')

@section('content')

<style>
    body {
        background-color: #E3F2FD;
        background-image: none;
    }

    .container-text-center {
        text-align: center;
    }

    .content {
        margin-top: 0px;
        margin-bottom: -30px;
        color: #69699c;
        font-weight: bold;
    }

    .judul-halaman {
        margin-top: 50px;
        margin-bottom: 50px;
        color: #69699c;
        font-weight: bold;
    }

    .hr-y {
        border: none;
        border-top: 4px solid #080a24;
        margin-top: -50px;
        border-radius: 3px;
    }

    .container-card {
        background-color: #4ea0e11f;
        border-radius: 8px;
        width: 100%;
        max-width: 1180px;
        margin: 0 auto;
        position: relative;
        padding: 20px;
        margin-bottom: 20px;
    }

    .col-content {
        color: black;
        font-size: 20px;
        margin: 50px;
    }

    .visi-misi-item {
        text-align: center;
        margin-top: -10px;
        font-weight: 900;
        color: green;
    }

    .hr-style {
        border: none;
        border-top: 3px solid #0c5417;
        margin-top: 30px;
        border-radius: 5px;
    }
</style>

<main>
    <div class="container container-text-center">
        <div class="content">
            <h5 class="judul-halaman">VISI & MISI SERTA TUJUAN <br> {{ $sekolah->nama }}</h5>
            <h4 style="margin-top: -30px; margin-bottom: 50px; color: #69699c; font-weight: bold;">{{ $data->judul_halaman ?? '' }}
            </h4>            
        </div>
        <hr class="hr-y">
    </div>

    <div class="container container-card">
        <div class="row align-items-center" style="margin-bottom: 100px;">
            <div class="col col-content">
                @if($data)
                    <h5 class="visi-misi-item">VISI</h5>
                    <p>
                        {{ $data->visi ?? '' }}
                    </p>
                    <hr class="hr-style">
                    <h5 class="visi-misi-item">MISI</h5>
                    <p>
                        {{ $data->misi ?? '' }}
                    </p>
                    <hr class="hr-style">
                    <h5 class="visi-misi-item">TUJUAN</h5>
                    <p>
                        {{ $data->tujuan ?? '' }}
                    </p>
                @else
                    <p>Tidak Ada Data Visi Misi.</p>
                @endif
            </div>
        </div>
    </div>
</main>
@endsection
