<!doctype html>
<html lang="en">
  <head>
  	<title>SMP NURUL HALIM</title>
	  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.18.0/font/bootstrap-icons.css">
	<link rel="icon" href="image/sitabung.png" type="image/x-icon">
	<!-- Tambahkan ini di bagian head halaman HTML Anda -->
	<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
	<meta http-equiv="Pragma" content="no-cache">
	<meta http-equiv="Expires" content="0">
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
		.custom-hr {
			border-top: 2px solid #fff;
			width: 100%; 
			margin: 0 auto; 
			height: 10px;
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
				<a href="#">
                	<img src="image/orang1.jpg" alt="Avatar" class="avatar"><b class="ml-2 mb-0" style="margin-top: 0; font-size: 15px; color: rgb(0, 204, 255);">{{ Auth::user()->email }}</b>
				</a>
            </div>
			<hr class="custom-hr">
			<center>			
				<h1><a href="#" class="logo">SiTabung <span>{{ $sekolah->nama }}</span></a></h1>
			</center>
			<hr class="custom-hr">

	        <ul class="list-unstyled components mb-5">
			<li><span style="font-weight: bold;">Menu</span></li>
            <li class="{{ request()->routeIs('home') ? 'active' : '' }}">
                <a href="/home"><span class="fa fa-home mr-3"></span> Home</a>
            </li>
			<li class="{{ request()->routeIs('datasiswa') ? 'active' : '' }}">
                <a href="/datasiswa"><span class="fa fa-user mr-3"></span> Data Siswa</a>
            </li>
			<li class="{{ request()->routeIs('transaksi-tabungan.index') ? 'active' : '' }}">
                <a href="{{ route('transaksi-tabungan.index') }}"><span class="fa fa-briefcase mr-3"></span>Transaksi Tabungan</a>
            </li>
			<li class="{{ request()->routeIs('ajukan-aduan.index') ? 'active' : '' }}">
				<a href="/siswa_ajukan_aduan"><span class="fa fa-home mr-3"></span> Data Aduan</a>
			</li>
	          <li class="{{ request()->routeIs('arsipan.index') ? 'active' : '' }}">
                <a href="/arsipan"><span class="fa fa-paper-plane mr-3"></span> Data Arsip</a>
	          </li>
			  <li style="margin-top: 20px;"><span style="font-weight: bold;">Admin</span></li>
			  <li class="{{ request()->routeIs('admin.update.profile.form') ? 'active' : '' }}">
				<a href="{{ route('admin.update.profile.form') }}"><span class="fa fa-user mr-3"></span>Profile Admin</a>
			</li>
				<li class="nav-item {{ Request::is('identitas-sekolah*') ? 'active' : '' }}">
					<a href="#setting" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><span class="fa fa-cogs mr-3"></span>Tentang Sekolah</a>
					<ul class="collapse list-unstyled" id="setting">
						<li class="{{ request()->routeIs('identitas-sekolah') ? 'active' : '' }}">
							<a href="{{ route('identitas-sekolah') }}">Identitas Sekolah</a>
						</li>
					</ul>
				</li>	
				@if(auth()->guard('admin')->check())
				<li class="{{ request()->routeIs('admin.logout') ? 'active' : '' }}">
					<form id="logout-form" action="{{ route('admin.logout') }}" class="d-none" method="POST">
						@csrf
						<button type="submit">Logout</button>
					</form>
					<a href="#" onclick="showLogoutConfirmation()">
						<span class="fa fa-user mr-3"></span>Logout
					</a>
				</li>			
				@endif	
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

	<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.7.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Your existing scripts -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

    <!-- Added logout confirmation script -->
	<script>
		function showLogoutConfirmation() {
    Swal.fire({
        title: 'Konfirmasi Logout',
        text: 'Apakah Anda yakin ingin logout?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Ya',
        cancelButtonText: 'Tidak'
    }).then((result) => {
        if (result.isConfirmed) {
            // Mengambil form dengan ID logout-form
            const logoutForm = document.getElementById('logout-form');

            // Mengirim form jika ditemukan
            if (logoutForm) {
                logoutForm.submit(); // Mengirim form saat pengguna memilih "Ya"
            }
        }
    });
}
	</script>
	

  </body>
</html>