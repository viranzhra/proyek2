@extends('layout.tampilan')

@section('content')
<main>
    <div class="container text-center">
        <div class="content">
            <h4 style="margin-top: 100px; margin-bottom: 50px; color: #69699c; font-weight: bold;">
                EKSTRAKULIKULER AKTIF <br>{{ $sekolah->nama }}
            </h4>
            <hr style="border: none; border-top: 5px solid #1623a9; margin-top: -30px; border-radius: 5px;">
        </div>
    </div>

    <div class="container">
        @forelse($eskuls as $eskul)
        <div class="card mb-4" style="border-radius: 25px; overflow: hidden; background-color: #9dc0df;">
            <div class="card-body d-md-flex position-relative">
                {{-- Foto tampilan eskul --}}
                <img src="{{ asset('uploads/' . $eskul->foto_tampilan) }}" class="flex-shrink-0 me-3 mb-3 mb-md-0" alt="#" style="max-width: 300px; border-radius: 25px" />

                <div style="display: flex; flex-direction: column; padding: 20px;">
                    <h4 class="card-title mt-3 mt-md-0 mb-2" style="color: #0f2e60;">
                        {{-- Subjudul eskul --}}
                        {{ $eskul->subjudul }}
                    </h4>
                    <hr style="border-bottom: 3px solid #0f2e60; margin-top: 5px;">
                        {!! \Illuminate\Support\Str::limit($eskul->deskripsi, 200) !!}
                </div>          
                <a href="{{ route('showAllEskul', $eskul->id) }}" class="btn btn-primary" style="background-color: #215382;
                    font-weight: bold;
                    border-radius: 20px;
                    margin-left: auto;
                    height: 40px;
                    margin-top: auto;">Selengkapnya</a>            
            </div>
        </div>
        @empty
        <p class="text-center mt-5">Tidak ada data eskul.</p>
        @endforelse
    </div>
</main>
@endsection
