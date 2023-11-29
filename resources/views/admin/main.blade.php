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
				<a href="#">
                	<img src="image/orang1.jpg" alt="Avatar" class="avatar"><b class="ml-2 mb-0" style="margin-top: 0; font-size: 15px; color: rgb(0, 204, 255);">viranzahra12@gmail.com</b>
				</a>
            </div>
			<hr>
			<h1><a href="#" class="logo">SiTabung <span>SMP NURUL HALIM WIDASARI</span></a></h1>
			<hr>

	        <ul class="list-unstyled components mb-5">
			<li><span style="font-weight: bold;">Menu</span></li>
	          <li class="{{ $title === 'Home' ? 'active' : '' }}">
	            <a href="/home"><span class="fa fa-home mr-3"></span>Home</a>
	          </li>
			  <li id="datasiswa" class="{{ Request::is('data*') ? 'active' : '' }}">
	            <a href="#datasiswa" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><span class="fa fa-user mr-3"></span>Data Siswa</a>
	            <ul class="collapse list-unstyled" id="datasiswa">
                <li class="{{ $title === 'Data Kelas 7' ? 'active' : '' }}">
                    <a href="/data1">Kelas 7</a>
                </li>
                <li class="{{ $title === 'Data Kelas 8' ? 'active' : '' }}">
                    <a href="/data2">Kelas 8</a>
                </li>
                <li class="{{ $title === 'Data Kelas 9' ? 'active' : '' }}">
                    <a href="/data3">Kelas 9</a>
                </li>
	            </ul>
	          </li>
			  <li id="pemasukan" class="{{ Request::is('pemasukan*') ? 'active' : '' }}">
	            <a href="#pemasukan" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><span class="fa fa-briefcase mr-3"></span>Pemasukkan Saldo</a>
	            <ul class="collapse list-unstyled" id="pemasukan">
					<li class="{{ request()->is('/pemasukan1') ? 'active' : '' }}">
						<a href="/pemasukan1">Kelas 7</a>
					</li>
					<li class="{{ request()->is('/pemasukan2') ? 'active' : '' }}">
						<a href="/pemasukan2">Kelas 8</a>
					</li>
					<li class="{{ request()->is('/pemasukan3') ? 'active' : '' }}">
						<a href="pemasukan3">Kelas 9</a>
					</li>
	            </ul>
	          </li>
			  <li id="pengeluaran" class="{{ Request::is('pengeluaran*') ? 'active' : '' }}">
	            <a href="#pengeluaran" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><span class="fa fa-sticky-note mr-3"></span>Pengeluaran Saldo</a>
	            <ul class="collapse list-unstyled" id="pengeluaran">
					<li>
						<a href="#">Kelas 7</a>
					</li>
					<li>
						<a href="#">Kelas 8</a>
					</li>
					<li>
						<a href="#">Kelas 9</a>
					</li>
	            </ul>
	          </li>
              <li id="aduan" class="{{ Request::is('aduan*') ? 'active' : '' }}">
	            <a href="#aduan" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><span class="fa fa-suitcase mr-3"></span>Data Aduan Siswa</a>
	            <ul class="collapse list-unstyled" id="aduan">
					<li class="{{ request()->is('/aduan1') ? 'active' : '' }}">
						<a href="/aduan1">Kelas 7</a>
					</li>
					<li class="{{ request()->is('/aduan2') ? 'active' : '' }}">
						<a href="/aduan2">Kelas 8</a>
					</li>
					<li class="{{ request()->is('/aduan3') ? 'active' : '' }}">
						<a href="/aduan3">Kelas 9</a>
					</li>
	            </ul>
	          </li>
			  
	          <li>
                <a href="#"><span class="fa fa-paper-plane mr-3"></span> Data Arsip</a>
	          </li>
			  <li style="margin-top: 20px;"><span style="font-weight: bold;">Admin</span></li>
			  <li class="{{ request()->routeIs('dataadmin') ? 'active' : '' }}">
				<a href="/data_admin"><span class="fa fa-user mr-3"></span>Data Admin</a>
				<li id="setting" class="{{ Request::is('update-profile*') ? 'active' : '' }}">
					<a href="#setting" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><span class="fa fa-cogs mr-3"></span>Setting</a>
					<ul class="collapse list-unstyled" id="setting">
						<li class="{{ request()->routeIs('admin.update.profile.form') ? 'active' : '' }}">
							<a href="{{ route('admin.update.profile.form') }}">Profile</a>
						</li>
					</ul>
				</li>	
				<li class="{{ request()->routeIs('admin.logout') ? 'active' : '' }}">
					<a href="/logoutadmin" data-bs-toggle="modal" data-bs-target="#logoutModal">
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