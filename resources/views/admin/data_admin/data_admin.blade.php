@extends('admin.main')

@section('content')
<div id="content" class="p-4 p-md-5 pt-5">
    <h2 class="mb-4">Profile Admin</h2>
<div class="card-body">
    <div class="tab-content">
      <div class="tab-pane show active" id="profile-1" role="tabpanel" aria-labelledby="profile-tab-1">
        <div class="row">
          <div class="col-md-4 col-xxl-3" style="margin-bottom: 10px;">
            <div class="card border">
              <div class="card-header">
                <h5>Upload Profile</h5>
              </div>
              <div class="card-body text-center">
                <div class="d-flex flex-column align-items-center">
                  @if ($url)
                      <img id="profileImage" src="{{ $url }}" alt="user-image" class="img-thumbnail rounded-circle mb-3">
                  @else
                      <!-- Add a default image or placeholder here -->
                      <img id="profileImage" src="{{ asset('path/to/default/image.jpg') }}" alt="default-image" class="img-thumbnail rounded-circle mb-3">
                  @endif
                  <small class="text-muted">Hallo {{ Auth::user()->username }}</small>
              </div>
                <br>
                <form method="POST" action="{{ route('admin.update.foto') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <input type="file" id="fileInput" name="profile_picture" class="form-control" onchange="displayFileName(this)" accept="image/*">
                    </div>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </form>
            </div>
            
            </div>
          </div>
          <div class="col-md-8 col-xxl-9">
            <div class="card border">
              <div class="card-header">
                <form method="POST" action="{{ route('admin.update.profile') }}" enctype="multipart/form-data">
                  @csrf
                  <h5>Update Data Admin</h5>
                </div>
                  <div class="card-body">
                      @if ($errors->any())
                      <div class="alert alert-danger">
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                      @endif
              
                      @if (session('success'))
                          <div class="alert alert-success">
                              {{ session('success') }}
                          </div>
                      @endif
              
                      <div class="row">
                          <div class="col-sm-12">
                              <div class="form-group">
                                  <label class="form-label"><b>Username :</b></label>
                                  <input type="text" class="form-control" name="username" placeholder="Masukkan username anda">
                              </div>
                          </div>
              
                          <div class="col-sm-12">
                              <!-- Input for current password -->
                              <div class="form-group">
                                  <label for="current_password"><b>Password Lama :</b></label>
                                  <input type="password" name="current_password" class="form-control" placeholder="Masukkan password lama">
                              </div>
                          </div>
              
                          <div class="form-group">
                              <label for="password"><b>Password Baru :</b></label>
                              <input type="password" name="password" class="form-control" placeholder="Ketikkan password baru">
                          </div>
              
                          <!-- Input for password confirmation -->
                          <div class="form-group">
                              <label for="password_confirmation"><b>Konfirmasi Password :</b></label>
                              <input type="password" name="password_confirmation" class="form-control" placeholder="Ketikkan kembali password">
                          </div>
              
                          <div class="col-sm-6" style="margin-top: 15px; ">
                              <button class="btn btn-primary">Update</button>
                          </div>
                      </div>
                  </div>
              </form>
              
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
    
<!-- Script untuk meng-handle perubahan pada file input dan mengirimkan AJAX request -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
  function displayFileName(input) {
      var fileName = input.files[0].name;
      document.getElementById('fileName').innerText = fileName;
  }
</script>

<script>
  // Automatically hide any alert after 3 seconds
  setTimeout(function() {
      document.querySelectorAll('.alert').forEach(function(alert) {
          alert.style.display = 'none';
      });
  }, 3000);
</script>
@endsection