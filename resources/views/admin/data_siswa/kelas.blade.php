@extends('admin.main')

@section('content')

    <!-- Page Content  -->
    <div id="content" class="p-4 p-md-5 pt-5">
        <div class="card mt-4">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="mb-3">
                        <h4 id="kelasHeading" class="m-0">Data Siswa</h4>
                    </div>
                    <div class="mb-">
                        <label for="kelas" class="mr-2" style="font-weight: bold">Pilih Kelas:</label>
                        <select id="kelas" class="btn btn-primary" onchange="redirectToClass()">
                            <option value="" disabled selected>Kelas 7-9</option>
                            <option value="7A" {{ request('search') == '7A' ? 'selected' : '' }}>Kelas 7A</option>
                            <option value="7B">Kelas 7B</option>
                            <option value="7C" {{ request('search') == '7C' ? 'selected' : '' }}>Kelas 7C</option>
                            <option value="7D" {{ request('search') == '7D' ? 'selected' : '' }}>Kelas 7D</option>

                            <option value="8A" {{ request('search') == '8A' ? 'selected' : '' }}>Kelas 8A</option>
                            <option value="8B" {{ request('search') == '8B' ? 'selected' : '' }}>Kelas 8B</option>
                            <option value="8C" {{ request('search') == '8C' ? 'selected' : '' }}>Kelas 8C</option>
                            <option value="8D" {{ request('search') == '8D' ? 'selected' : '' }}>Kelas 8D</option>

                            <option value="9A" {{ request('search') == '9A' ? 'selected' : '' }}>Kelas 9A</option>
                            <option value="9B" {{ request('search') == '9B' ? 'selected' : '' }}>Kelas 9B</option>
                            <option value="9C" {{ request('search') == '9C' ? 'selected' : '' }}>Kelas 9C</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-header">
                <div class="input-group">
                    <div class="form-outline" data-mdb-input-init>
                    <form action="?search ">
                      <input type="search" name="search" id="form1" class="form-control" placeholder="Search"/>
                    
                </div>
                    <button type="submit" class="btn btn-primary" data-mdb-ripple-init>
                      <i class="fas fa-search"></i>
                    </button>
                </form>
                  </div>
                    <a href="#" style="float: right; margin-top: -30px; margin-right: 130px;"><img src="image/icon_excel.png" alt="" width="25px"> Download</a>
                    <a href="#" style="float: right; margin-top: -30px;"><img src="image/icon_pdf.png" alt="" width="25px"> Download</a>
            </div>
            <div class="card-body">
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NISN</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Tanggal Lahir</th>
                            <th>Kelas</th>
                            <th>Tahun Angkatan</th>
                            <th>Aksi</th>
                        </tr>
                        <tbody>
                            @forelse ($murid as $index => $row)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $row->nisn_murid }}</td>
                                    <td>{{ $row->nama_murid }}</td>
                                    <td>{{ $row->jenis_kelamin }}</td>
                                    <td>{{ $row->tgl_lahir }}</td>
                                    <td>{{ $row->kelas }}</td>
                                    <td>{{ $row->tahun_angkatan }}</td>

                                    <!-- ... Existing table data ... -->
                                    <td>
                                        <a href="#" class="btn btn-success btn-sm" title="Edit" data-toggle="modal" data-target="#editModal">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        @foreach ($murid as $siswa)
                                        <form action="{{ route('siswa.destroy', ['nisn' => $siswa->nisn_murid]) }}" method="post" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger btn-sm delete-btn" data-id="{{ $siswa->nisn_murid }}" title="Delete">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    @endforeach
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">No data available</td>
                                </tr>
                            @endforelse
                        </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{ $murid->links() }}
                </div>
                
                {{-- tambah data --}}
                <a href="/siswa" data-toggle="modal" data-target="#tambahModal" class="btn btn-primary">Tambah Data</a>
            </div>
    </div>


<!-- Modal Tambah Data -->
<div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahModalLabel">Tambah Data Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form tambah data siswa -->
                <form action="{{ route('siswa.store') }}" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="nisn">NISN</label>
                        <input type="text" class="form-control" id="nisn" name="nisn_murid" required>
                    </div>

                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama_murid" required>
                    </div>

                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                            <option value="" disabled selected>Pilih jenis kelamin</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="tgl_lahir">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" required>
                    </div>

                    <div class="form-group">
                        <label for="pilihkelas">Kelas</label>
                        <select class="form-control" id="pilihkelas" name="id_kelas" required>
                            <option value="" disabled selected>Pilih Kelas</option>
                                @foreach ($kelas as $kelasItem)
                                    <option value="{{ $kelasItem->id }}">{{ $kelasItem->ket_kelas }}</option>
                                @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="ta">Tahun Angkatan</label>
                        <select class="form-control" id="ta" name="id_ta" required>
                            <option value="" disabled selected>Pilih Tahun Angkatan</option>
                                @foreach ($tahunAngkatan as $ta)
                                    <option value="{{ $ta->id }}">{{ $ta->tahun }}</option>
                                @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Modal Edit Data -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahModalLabel">Edit Data Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form edit data siswa -->
                <form action="" method="post">
                    @csrf

                    <div class="form-group">
                        @foreach ($murid as $siswa)
                        <label for="nisn">NISN</label>
                        <input type="text" class="form-control" id="nisn" name="nisn" value="{{ $siswa->nisn_murid }}" required>
                        @endforeach
                    </div>

                    <div class="form-group">
                        @foreach ($murid as $siswa)
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ $siswa->nama_murid }}" required>
                        @endforeach
                    </div>

                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        @foreach ($murid as $siswa)
                        <select name="jenis_kelamin" class="form-control">
                            <option value="" disabled selected>Pilih jenis kelamin</option>
                            <option value="Laki-laki" {{ $siswa->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="Perempuan" {{ $siswa->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                        @endforeach
                    </div>

                    <div class="form-group">
                        @foreach ($murid as $siswa)
                        <label for="tgl_lahir">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="{{ $siswa->tgl_lahir }}" required>
                        @endforeach
                    </div>
                    <div class="form-group">
                        <label for="kelas">Kelas:</label>
                        <select name="id_kelas" class="form-control">
                            <option value="" disabled selected>Pilih Kelas</option>
                            @foreach($kelas as $kelasItem)
                                <option value="{{ $kelasItem->id }}" {{ ($murid->id_kelas) && $murid->id_kelas == $kelasItem->id ? 'selected' : '' }}>
                                    {{ $kelasItem->ket_kelas }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="ta">Tahun Angkatan</label>
                        <select class="form-control" id="ta" name="id_ta" required>
                            <option value="" disabled selected>Pilih Tahun Angkatan</option>
                            @foreach($tahunAngkatan as $tahunItem)
                                <option value="{{ $tahunItem->id }}" {{ isset($murid->id_ta) && $murid->id_ta == $tahunItem->id ? 'selected' : '' }}>
                                    {{ $tahunItem->tahun }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    
                    

                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>

    
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.19.0/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

    <script>
        function redirectToClass() {
            var selectedValue = document.getElementById('kelas').value;
            var headingElement = document.getElementById("kelasHeading");
            headingElement.innerText = "Data Siswa Kelas " + selectedValue;
            var redirectURL = "?search=" + encodeURIComponent(selectedValue);
            window.location.href = redirectURL;
        }
    </script>

</div>

@endsection
