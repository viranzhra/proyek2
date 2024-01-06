@extends('layout.tampilan')

@section('content')
    <br><br><br>
    <div class="container text-center" style="background-color: #6aa9dc96; border-radius: 8px; position: relative; padding-bottom: 30px;">
        <div class="row align-items-center justify-content-center" style="margin-bottom: 100px;">

            {{-- Kolom pertama untuk foto dokumentasi1 --}}
            <div class="container text-center" style="margin-top: 30px; margin-bottom: -30px">
                <img style="max-width: 100%; max-height: 400px; object-fit: cover; object-position: center;" src="{{ asset('uploads/' . $firstEskul->foto_dokumentasi1) }}" alt="" class="img-fluid rounded mb-4 mx-auto">
            </div>

            {{-- Kolom kedua untuk informasi eskul dan foto dokumentasi2 --}}
            <div class="col-md-12 mt-4">
                <hr style="border-bottom: 3px solid #0f2e60; margin-top: 5px;">

                <h4 class="mt-4">
                    {{ $firstEskul->subjudul }}
                </h4>
                <div class="row">
                    <div class="col-md-6 pt-4">
                        <img style="max-width: 350px" src="{{ asset('uploads/' . $firstEskul->foto_dokumentasi2) }}" alt="" class="img-fluid rounded mb-4">
                    </div>
                    <div class="col-md-5">
                        <p class="pt-3" style="text-align: justify;">
                            {{ $firstEskul->deskripsi }}
                        </p>
                    </div>                                      
                </div>
            </div>
        </div>
    </div>
    <div class="container text-center mt-3">
        <a href="/eskul" class="btn btn-primary" style="background-color: #215382; font-weight: bold; border-radius: 20px;">Kembali</a>
    </div>
@endsection
