<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('storage/' . $sekolah->logo_path) }}" type="image/x-icon">
    <link href="css/landingpage.css" rel="stylesheet">
    <title>FORM ADUAN</title>
    <style>
        body{
            background-color: #cacaca;
            background-image: none;
        }
      </style>
</head>
<body>

<div class="container" style="margin-top: 40px; margin-bottom: -20px; max-width: 1100px;">
    <div id="content" class="p-4 p-md-5 pt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card border" style="background-color: rgb(255 255 255 / 46%)">
                    <div class="card-header" style="background-color: #969696;
                    font-weight: bold;
                    color: #ffffff;">
                        <h5 class="card-title text-center">FORMULIR ADUAN SISWA</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('form.aduan.store') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label style="font-weight: bold" for="pilihkelas">Kelas:</label>
                                <select class="form-select" id="pilihkelas" name="id_kelas" required style="border-radius: 25px;">
                                    <option value="" disabled selected>Pilih Kelas</option>
                                    @foreach ($kelas as $kelasItem)
                                        <option value="{{ $kelasItem->id }}">{{ $kelasItem->ket_kelas }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label style="font-weight: bold" for="idsiswa">Nama Siswa:</label>
                                <select class="form-select" id="idsiswa" name="id_siswa" required style="border-radius: 25px;">
                                    <option value="" disabled selected>Pilih Nama Siswa</option>
                                    @foreach($murids as $murid)
                                        <option value="{{ $murid->id }}">{{ $murid->nama_murid }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label style="font-weight: bold" for="kategori_aduan" class="form-label">Kategori Aduan :</label>
                                <select class="form-select" id="kategori_aduan" name="kategori_aduan" required style="border-radius: 25px;">
                                    <option value="" disabled selected>Pilih Kategori Aduan</option>
                                    @foreach($kategoriAduan as $kategori)
                                        <option value="{{ $kategori->id }}">{{ $kategori->ket_aduan }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label style="font-weight: bold" for="aduan" class="form-label">Isi Aduan :</label>
                                <textarea class="form-control" id="aduan" name="aduan" rows="4" placeholder="Tuliskan aduan Anda" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label style="font-weight: bold" for="bukti" class="form-label">Bukti Aduan :</label>
                                <input type="file" class="form-control" id="bukti" name="bukti_aduan" rows="4" placeholder="Tuliskan aduan Anda" required></input>
                            </div>
                            <button type="submit" class="btn btn-primary">Kirim Aduan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: '{{ session('success') }}',
        });
    @endif
</script>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    document.getElementById('pilihkelas').addEventListener('change', async function () {
        const selectedClass = document.getElementById('pilihkelas').value;

        // Fetch student data based on the selected class
        axios.get(`/getUserDataById/${selectedClass}`)
            .then(response => {
                const userData = response.data;
                console.log(userData);  // Log data ke konsol

                // Clear existing options
                const idsiswaDropdown = document.getElementById('idsiswa');
                idsiswaDropdown.innerHTML = '';

                // Create a Set to keep track of added student IDs and avoid duplicates
                const addedStudentIDs = new Set();

                if (userData.length > 0) {
                    userData.forEach(student => {
                        // Check if student ID is already added to avoid duplicates
                        if (!addedStudentIDs.has(student.id_siswa)) {
                            const option = document.createElement('option');
                            option.value = student.id_siswa;
                            option.text = student.nama_murid;
                            idsiswaDropdown.appendChild(option);

                            // Add the student ID to the Set
                            addedStudentIDs.add(student.id_siswa);
                        }
                    });
                } else {
                    // If no data is found, display a default option
                    const defaultOption = document.createElement('option');
                    defaultOption.text = 'Nama siswa tidak tersedia';
                    idsiswaDropdown.appendChild(defaultOption);
                }
            })
            .catch(error => {
                console.error('Error fetching data:', error);
            });
    });
</script>

    
</body>
</html>
