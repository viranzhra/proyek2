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
    </main>

          <div class="container text-center" style="margin-bottom: 100px; margin-top: 600px; position: relative;">
            <div class="row gx-5" style="margin-left: 150px;">
              <div class="col">
               <div class="p-3" style="background-color: #4a9ae8; border-radius: 8px;">
                <a href="#" class="gmbr">
                  <img class="animasi-gambar" src="../image/prestasi.png" alt="tropi" width="150px" height="150px" style="margin-bottom: 10px;"> <br> <span class="tombol1">Prestasi Siswa</span>
                </a>
               </div>
              </div>
              <div class="col">
                <div class="p-3" style="background-color:#4a9ae8; border-radius: 8px;">
                  <a href="#" class="gmbr">
                    <img class="animasi-gambar" src="../image/logo_guru.png" alt="tropi" width="150px" height="150px" style="margin-bottom: 10px;"> <br> <span class="tombol1">Profil Guru</span>
                  </a>                  
                </div>
              </div>
              <div class="col">
                <div class="p-3" style="background-color: #4a9ae8; border-radius: 8px;">
                  <a href="#" class="gmbr">
                    <img class="animasi-gambar" src="../image/eskul.png" alt="tropi" width="150px" height="150px" style="margin-bottom: 10px;"> <br> <span class="tombol1">Ekstrakurikuler</span>
                  </a>                   
                </div>
              </div>
            </div>
          </div>
        
          <div class="container text-center" style="background-color: rgba(0, 0, 0, 0.7); border-radius: 8px; width: 1000px; position: relative;">
            <div class="row align-items-center" style="margin-bottom: 100px;">
              <div class="col" style="color: white; font-size: 20px;">
                <p class="slide-in-from-bottom">"SMP Nurul Halim Widasari adalah sekolah yang sangat
                  terkenal di wilayah ini karena reputasinya yang kuat
                  dalam memberikan pendidikan berkualitas kepada 
                  para siswa-siswinya."</p>
              </div>
            </div>
          </div>

          <div class="container text-center" style="position: relative;">
            <div class="row gx-5">
              <div class="col">
               <div class="p-3">
                <iframe src="https://www.google.com/maps?q=-6.4529405,108.2834457"
                 width="450" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
               </div>
               </div>
               <div class="col">
                <div class="p-3" style="background-color: rgb(238 238 238 / 70%); border-radius: 8px; width: 500px; position: relative; text-align: left; margin-bottom: 30px;">
                  <h6 style="color: rgb(8 110 145);">IDENTITAS SEKOLAH</h6>
                  <span style="color: black; font-size: 15px;"><b>SMP NURUL HALIM WIDASARI</b> <br>
                    <b>NPSN &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</b> 20216093 <br>
                    <b>Status Sekolah &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</b> Swasta <br>
                    <b>SK Pendirian Sekolah &nbsp;&nbsp; :</b> 402/102/KEP/E/94 <br>
                    <b>Tanggal SK Pendirian	&nbsp;&nbsp; :</b> 1994-06-15 <br>
                    <b>Status Kepemilikan	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</b> Yayasan <br>
                    <b>SK Izin Operasional	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</b>	402/102/KEP/E/94 <br>
                    <b>Tgl SK Izin Operasional	:</b>	1994-06-15 <br>
                    <b>NPWP	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</b>	027258441437000 <br>
                  </span>
                 </div>
                <div class="p-3" style="background-color: rgb(0 140 172 / 70%); border-radius: 8px; width: 300px; position: relative; text-align: left;">
                  <h6 style="color: rgb(0 0 0);">KONTAK SEKOLAH</h6>
                 <a href="#" style="color: #ebf4fb;">
                  <img src="../image/telpon.png" alt="telp" width="30px" height="30px"> 351669
                 </a><br>
                 <a href="#" style="color: #ebf4fb;">
                  <img src="../image/email.png" alt="email" width="30px" height="30px"> smpnurulhalim93@gmail.com
                 </a>
                </div>
              </div>
            </div>
          </div>
  </main>
@endsection
