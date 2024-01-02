@extends('layout.tampilan')

@section('content')
<main>
  <div class="container text-center">
    <div class="content">
      <h4 style="margin-top: 100px; margin-bottom: 50px; color: #69699c; font-weight: bold;">
        {{-- Tampilkan judul utama dari data prestasi pertama --}}
        {{ $prestasis->first()->judul_utama ?? 'Judul Default' }}
      </h4>
      <hr style="border: none; border-top: 5px solid #1623a9; margin-top: -30px; border-radius: 5px;">
    </div>
  </div>

  <div class="container text-center" style="margin-top: 30px; margin-bottom: 50px">
    <div>
      @if ($prestasis && $prestasis->count() > 0)
        <img src="{{ asset('images/' . $prestasis->first()->gambar_utama) }}" class="img-fluid" alt="..." style="border-radius: 25px; height: 300px; width: 100%" />
      @else
        <img src="{{ asset('image/piala.jpg') }}" class="img-fluid" alt="Gambar Tidak Tersedia" style="border-radius: 25px; height: 300px; width: 100%" />
      @endif
    </div>
  </div>

  <div class="container">
    @if($allPrestasis && $allPrestasis->count() > 0)       
        @foreach($allPrestasis as $allPrestasi)
            <div class="row mb-4">
                {{-- Gambar tampilan --}}
                <div class="col-md-3">
                    <img
                        src="{{ asset('images/' . $allPrestasi->foto_tampilan) }}"
                        class="img-fluid rounded"
                        alt="#"
                        style="border-radius: 25px; height: 200px; width: 100%; object-fit: cover;"
                    />
                </div>
                {{-- Informasi prestasi --}}
                <div class="col-md-9">
                    <div class="card border-0" style="background-color: #9dc0df; border-radius: 25px; width: 100%;">
                        <div class="card-body">
                            <h5 class="card-title mb-3">{{ $allPrestasi->subjudul }}</h5>
                            <p class="card-text mb-3">{{ \Illuminate\Support\Str::limit($allPrestasi->deskripsi, 250) }}</p>
                            <a href="{{ route('showAllPrestasi', $allPrestasi->id) }}" class="btn btn-primary" style="background-color: #215382; font-weight: bold; border-radius: 20px;">Selengkapnya</a>                          </div>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <p>Tidak ada data prestasi.</p>
    @endif
</div>
</main>
@endsection
