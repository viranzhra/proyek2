<!doctype html>
<html lang="en">
  <head>
  	<title>SMP NURUL HALIM</title>
	<link rel="icon" href="image/sitabung.png" type="image/x-icon">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="image/logosmp.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/dashboard/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
	<script src="js/script.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<style>
		a {
			text-decoration: none;
		}

		.avatar {
			width: 50px;
			height: 50px;
			object-fit: cover;
			border-radius: 50%;
    	}
	</style>
  </head>
  <body style="background-color: #e7f3ff;">
		
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
	          <i class="fa fa-bars"></i>
	          <span class="sr-only">Toggle Menu</span>
	        </button>
        </div>
		<div class="p-4">
			<div class="text-center mb-3 d-flex align-items-center">
                <!-- Avatar dan Nama Admin -->
				@if(Auth::user()->murid)
				<a href="#">
					<img src="image/orang1.jpg" alt="Avatar" class="avatar">
					<b class="ml-2 mb-0" style="margin-top: 0; font-size: 15px; color: rgb(0, 204, 255);">
						{{ Auth::user()->murid->nama_murid ?? 'Nama Tidak Tersedia' }}
					</b>
				</a>
			@else
				<!-- Handle jika murid null -->
				<p>User tidak terkait dengan Murid.</p>
			@endif
            </div>
			<hr>
			<h1><a href="#" class="logo">SiTabung <span>SMP NURUL HALIM WIDASARI</span></a></h1>
			<hr>  

	        <ul class="list-unstyled components mb-5">
			<li><span style="font-weight: bold;">Menu</span></li>
                <li>
                    <li class="{{ request()->routeIs('home_siswa') ? 'active' : '' }}">
						<a href="/home_siswa"><span class="fa fa-home mr-3"></span> Home</a>
                </li>
                <li class="{{ request()->routeIs('profilsiswa') ? 'active' : '' }}">
	                <a href="/profilsiswa"><span class="fa fa-home mr-3"></span> Profil Siswa</a>
	            </li>
                <li>
					<li class="{{ request()->routeIs('riwayat_siswa') ? 'active' : '' }}">
	                <a href="/riwayat_siswa"><span class="fa fa-home mr-3"></span> Riwayat Tabungan</a>
	            </li>
                <li class="{{ request()->routeIs('aduansiswa') ? 'active' : '' }}">
	                <a href="/aduansiswa"><span class="fa fa-home mr-3"></span> Ajukan Aduan</a>
	            </li>
				<li class="{{ request()->routeIs('siswa.logout') ? 'active' : '' }}">
					<form id="logout-form" action="{{ route('siswa.logout') }}" class="d-none" method="POST">
						@csrf
						<button type="submit">Logout</button>
					</form>
					<a href="#" onclick="showLogoutConfirmation()">
						<span class="fa fa-user mr-3"></span>Logout
					</a>
				</li>		
	        </ul>

	        <div class="footer"> 
	        	<p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						  Copyright &copy;<script>document.write(new Date().getFullYear());</script> | SiTabung
						  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
	        </div>

	      </div>
    	</nav>

    <div class="container">
        @yield("content")
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

	<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
	<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  </body>
</html>