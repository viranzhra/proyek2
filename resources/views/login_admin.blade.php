@extends('layout.main')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<!-- Include SweetAlert script -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
<style>
  /* style untuk form login */
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');

  * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
  }

  ::placeholder {
    color: rgb(187, 187, 187);
  }

  .overlay {
    height: 750px;
  }

  .wrapper {
      max-width: 350px;
      min-height: 500px;
      margin: 80px auto;
      padding: 40px 30px 30px 30px;
      background-color: #000000a1;
      border-radius: 15px;
      box-shadow: 13px 13px 20px #3c46519e, -13px -13px 20px #503e3ebf;
      position: relative;
  }

  .logo {
      width: 80px;
      margin: auto;
  }

  .logo img {
      width: 100%;
      height: 80px;
      object-fit: cover;
      border-radius: 50%;
  }

  .wrapper .name {
      font-weight: 600;
      font-size: 1.4rem;
      letter-spacing: 1.3px;
      padding-left: 10px;
      color: #fff;
  }

  .wrapper .form-field input {
      width: 100%;
      display: block;
      border: none;
      outline: none;
      background: none;
      font-size: 1.2rem;
      color: #fff;
      padding: 10px 15px 10px 10px;
      /* border: 1px solid red; */
  }

  .wrapper .form-field {
      padding-left: 10px;
      margin-bottom: 20px;
      border-radius: 20px;
      background-color: #9999999c;
  }

  .wrapper .form-field .fas {
      color: #555;
  }

  .wrapper .btn {
    box-shadow: none;
    width: 100%; /* Mengubah lebar tombol agar sesuai dengan lebar formulir */
    height: 40px;
    background-color: #046400;
    color: #fff;
    border-radius: 25px;
    letter-spacing: 1.3px;
  }

  .wrapper .btn:hover {
      background-color: #13981a;
  }

  .wrapper a {
      text-decoration: none;
      font-size: 0.8rem;
      color: #03A9F4;
  }

  .wrapper a:hover {
      color: hsl(199, 70%, 71%);
  }

  .center-container {
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .small-popup {
        max-width: 300px;
  }
</style>

<div class="overlay"></div>
      <div class="wrapper">
        <div class="logo">
            <img src="../image/sitabung.png" alt="">
        </div>
        <div class="text-center mt-4 name">
            Login Admin
        </div>        
        <form class="p-3 mt-3" action="{{ route('admin.login') }}" method="POST">
            @csrf
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="text" name="username" id="username" placeholder="Username" required>
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="far fa-envelope"></span> 
                <input type="email" name="email" id="email" placeholder="Email" required>
            </div>
            <div class="form-field d-flex align-items-center">
              <span class="fas fa-key"></span>
              <input type="password" name="password" id="pwd" placeholder="Password" required>
            </div>
            <div class="center-container">
              <button type="submit" class="btn mt-3">Login</button>
          </div>
        </form>
        {{-- <div class="text-center fs-6">
            <a href="#">Forget password?</a>
        </div> --}}
    </div>

    @if(session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '{{ session('error') }}',
            customClass: {
                popup: 'small-popup',
            },
            iconHtml: '<i class="fas fa-exclamation-circle" style="font-size: 18px;"></i>',
        });
    </script>
    @endif
@endsection
