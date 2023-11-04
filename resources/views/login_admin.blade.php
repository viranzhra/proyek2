@extends('layout.main')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
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
    width: 150px;
    height: 40px;
    background-color: #046400;
    color: #fff;
    border-radius: 25px;
    letter-spacing: 1.3px;
  }

  .center-container {
    display: flex;
    justify-content: center;
    align-items: center;
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

  @media(max-width: 380px) {
      .wrapper {
          margin: 30px 20px;
          padding: 40px 15px 15px 15px;
      }
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
        <div class="w-50 center border rounded px-3 py-3 mx-auto"></div>
        <form class="p-3 mt-3" action="/visimisi" method="POST">
            @csrf
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="text" name="username" id="username" placeholder="Username">
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="email" name="email" id="email" placeholder="Email">
            </div>
            <div class="form-field d-flex align-items-center">
              <span class="fas fa-key"></span>
              <input type="password" name="password" id="pwd" placeholder="Password">
            </div>
            <div class="center-container">
              <submit class="btn mt-3">Login</submit>
          </div>
        </form>
        <div class="text-center fs-6">
            <a href="#">Forget password?</a>
        </div>
    </div>
@endsection