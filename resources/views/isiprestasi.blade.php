@extends('layout.tampilan')

@section('content')
    <main>
        <div class="container text-center" style="background-color: #4ea0e11f; border-radius: 8px; width: 1180px; position: relative; margin-top: 100px;">
            <div class="row align-items-center" style="margin-bottom: 100px;">
              <img src="image/tari-1.jpg" alt="" style="width: 400px; padding: 20px; border-radius: 25px;">
              <div class="col" style="color: black; font-size: 20px; margin: 50px;">
                <h4
            class="mt-0"
            style="margin-top: 200px; padding: 20px"
          >
          Siswa Kelas 7 meraih juara 1 nasional LOMBA TARI
          </h4>
          <hr
          style="
            border: none;
            border-top: 5px solid #1623a9;
            border-radius: 5px;
          "
        />
          <p style="padding: 20px; position: relative;">
            This is some placeholder content for the custom component. It is
            intended to mimic what some real-world content would look like, and
            we're using it here to give the component a bit of body and size.
          </p>
              </div>
            </div>
          </div>
          <a href="/prestasi" class="btn btn-primary" style="
          float: right;
          margin-right: 20px;
          background-color: #215382;
          font-weight: bold;
          border-radius: 20px;
          margin-top: -75px;
        ">Kembali</a>
      </main>
      @endsection