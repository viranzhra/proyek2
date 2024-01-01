@extends('layout.tampilan')

@section('content')
<style>
  .bg-custom {
    background-color: #cbe5fa;
  }
</style>
<main>
    <div class="container text-center bg-custom rounded p-4" style="max-width: 1180px; margin-top: 100px;">
        <div class="row align-items-center mb-4">
            {{-- Foto dokumentasi --}}
            <div class="col-md-6">
                <img src="{{ asset('images/' . $firstPrestasi->foto_dokumentasi) }}" alt="" class="img-fluid rounded">
            </div>

            {{-- Informasi prestasi --}}
            <div class="col-md-6 text-left">
                <h4 class="mt-4">
                    {{ $firstPrestasi->subjudul }}
                </h4>
                <hr class="border-top-5 border-primary" />
                <p class="pt-4">
                    {{ $firstPrestasi->deskripsi }}
                </p>
            </div>
        </div>
    </div>

    <div class="container text-center">
        <a href="/prestasi" class="btn btn-primary mt-2" style="background-color: #215382; font-weight: bold; border-radius: 20px;">Kembali</a>
    </div>
</main>
@endsection
