<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/prestasi.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>SMP NURUL HALIM WIDASARI</title>
    <style>
        body {
            background-color: #E3F2FD;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary" style="z-index: 2;">
        <div class="container-fluid" style="background-color: #4086c7;
        position: fixed;
        margin-top: 50px;
        padding: 8px;">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <a class="navbar-brand" href="#"><img src="../image/logo.png" alt="logo sekolah" width="50px" height="50px"></a>
          <h6 class="navbar-brand" href="#" style="color: white;">SMP NURUL HALIM WIDASARI</h6>
          <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            
            <ul class="nav nav-underline me-auto mb-2 mb-lg-0" style="margin-left: 150px;">
              <li class="nav-item">
                <a class="nav-link {{ $title === "Beranda" ? 'active' : "" }}" aria-current="page" href="/" style="color: white;">BERANDA </a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ $title === "Kontak" ? 'active' : "" }}" href="#" style="color: white;">KONTAK</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ $title === "Visi Misi" ? 'active' : "" }}" href="/visimisi" style="color: white;">VISI MISI</a>
              </li>
            </ul>
              <a href="/loginsiswa" class="btn btn-outline-success" type="submit" style="background-color: #215382; color: white; font-weight: bold;">LOGIN</a>
          </div>
        </div>
      </nav>
 
      <div class="container">
        @yield('content')
    </div>

      <footer>
        copyright&copy;2023 | Si Tabung
      </footer>

</body>
</html>