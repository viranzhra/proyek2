<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/landingpage.css" rel="stylesheet">
    <link rel="icon" href="{{ asset('storage/' . $sekolah->logo_path) }}" type="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>{{ $sekolah->nama }}</title>
</head>
<body>
 
      <div class="container">
        @yield('content')
    </div>

</body>
</html>