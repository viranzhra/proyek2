@extends('layout.main')

@section('content')
    <main>
      <div class="container text-center">
        <div class="overlay">
          <div class="content">
            <h4 class="slide-in-from-top" style="margin-top: 100px; margin-bottom: 50px; color: white;">Selamat Datang di Website Kami!</h4>
            <img class="continuous-zoom" src="../image/sitabung.png" alt="sitabung" width="300px" height="300px" style="margin-bottom: 100px; background-color: rgba(0, 0, 0, 0.2);">
          </div>
        </div>
      </div>
    

          <div class="container text-center" style="margin-bottom: 100px; margin-top: 600px; position: relative;">
            <div class="row" style="margin-left: 150px;">
              <div class="col">
               <div class="p-3" style="background-color: #4a9ae8; border-radius: 8px;">
                <a href="/prestasi" class="gmbr">
                  <img class="animasi-gambar" src="../image/prestasi.png" alt="tropi" width="150px" height="150px" style="margin-bottom: 10px;"> <br> <span class="tombol1">Prestasi Siswa</span>
                </a>
               </div>
              </div>
              <div class="col">
                <div class="p-3" style="background-color:#4a9ae8; border-radius: 8px;">
                  <a href="/profilguru" class="gmbr">
                    <img class="animasi-gambar" src="../image/logo_guru.png" alt="tropi" width="150px" height="150px" style="margin-bottom: 10px;"> <br> <span class="tombol1">Profil Guru</span>
                  </a>                  
                </div>
              </div>
              <div class="col">
                <div class="p-3" style="background-color: #4a9ae8; border-radius: 8px;">
                  <a href="/eskul" class="gmbr">
                    <img class="animasi-gambar" src="../image/eskul.png" alt="tropi" width="150px" height="150px" style="margin-bottom: 10px;"> <br> <span class="tombol1">Ekstrakurikuler</span>
                  </a>                   
                </div>
              </div>
            </div>
          </div>
        
          <div class="container text-center" style="background-color: rgba(0, 0, 0, 0.7); border-radius: 8px; width: 1000px; position: relative;">
            <div class="row align-items-center" style="margin-bottom: 100px;">
              <div class="col" style="color: white; font-size: 20px;">
                <p class="slide-in-from-bottom">"{{ $sekolah->deskripsi_sekolah }}"</p>
              </div>
            </div>
          </div>
          <div class="container text-center" style="position: relative; margin: -50px;">
            <div class="row gx-5" style="margin-left: 100px;">
              <div class="col">
               <div class="p-3">
                <!--Google map-->
                  <div id="map-container-google-2" class="z-depth-1-half map-container" style="height: 500px">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.5478154935236!2d108.28450517475255!3d-6.452046993539386!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6ec64de90c1a9b%3A0xf4f0c790e8ff3930!2sSMP%20NURUL%20HALIM!5e0!3m2!1sid!2sid!4v1701106100371!5m2!1sid!2sid" width="450" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                  </div>                
               </div>
               </div>
               <div class="col">
                <div class="p-3" style="background-color: rgb(238 238 238 / 70%); border-radius: 8px; width: 500px; position: relative; text-align: left; margin-bottom: 30px;">
                  <h6 style="color: rgb(8 110 145);">IDENTITAS SEKOLAH</h6>
                  <span style="color: black; font-size: 15px;"><b>{{ $sekolah->nama }}</b> <br>
                    <b>NPSN &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</b> {{ $sekolah->npsn }} <br>
                    <b>Status Sekolah &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</b> {{ $sekolah->status_sekolah }} <br>
                    <b>SK Pendirian Sekolah &nbsp;&nbsp; :</b> {{ $sekolah->sk_pendirian }} <br>
                    <b>Tanggal SK Pendirian	&nbsp;&nbsp; :</b> {{ $sekolah->tgl_sk_pendirian }} <br>
                    <b>Status Kepemilikan	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</b> {{ $sekolah->status_kepemilikan }} <br>
                    <b>SK Izin Operasional	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</b>	{{ $sekolah->sk_izin_operasional }} <br>
                    <b>Tgl SK Izin Operasional	:</b>	{{ $sekolah->tgl_sk_izin_operasional }} <br>
                    <b>NPWP	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</b>	{{ $sekolah->npwp }} <br>
                  </span>
                 </div>
                <div id="kontak" class="p-3" style="background-color: rgb(0 140 172 / 70%); border-radius: 8px; width: 300px; position: relative; text-align: left;">
                  <h6 style="color: rgb(0 0 0);">KONTAK SEKOLAH</h6>
                 <a href="#" style="color: #ebf4fb;">
                  <img src="../image/telpon.png" alt="telp" width="30px" height="30px"> {{ $sekolah->no_telp }}
                 </a><br>
                 <a href="#" style="color: #ebf4fb;">
                  <img src="../image/email.png" alt="email" width="30px" height="30px"> {{ $sekolah->email_sekolah }}
                 </a>
                </div>
              </div>
            </div>
          </div>
  </main>
@endsection
