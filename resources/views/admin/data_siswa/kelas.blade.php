@extends('admin.main')

@section('content')

    <!-- Page Content  -->
    <div id="content" class="p-4 p-md-5 pt-5">
        <div class="card mt-4">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="mb-3">
                        <h4 id="kelasHeading" class="m-0">Data Siswa @if ($search) Kelas {{ $search }} @endif</h4>
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
                                        <button type="button" class="btn btn-success btn-sm" title="Edit" data-toggle="modal" data-target="#editModal" onclick="openEditModal('{{ $row->nisn_murid }}', '{{ $row->nama_murid }}', '{{ $row->jenis_kelamin }}', '{{ $row->id_kelas }}', '{{ $row->id_ta }}')">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        
                                        <form action="{{ route('siswa.destroy', ['nisn' => $row->nisn_murid]) }}" method="post" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    
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

@if ($murid->count() > 0)
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
                @foreach($murid as $siswa)
                <form id="edit_action" action="" method="post">
                    @endforeach
                    @csrf
                    @method('PUT')
            
                    <div class="form-group">
                        <label for="nisn">NISN</label>
                        <input type="text" class="form-control" id="nisn_edit" name="nisn_murid" value="" required>
                    </div>
            
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama_edit" name="nama_murid" value="" required>
                    </div> 

                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select id="edit_jk" name="jenis_kelamin" class="form-control">
                            <option value="" disabled selected>Pilih jenis kelamin</option>
                            <option value="Laki-laki" {{ $siswa->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="Perempuan" {{ $siswa->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>                    

                    <div class="form-group">
                        
                        <label for="tgl_lahir">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="{{ $siswa->tgl_lahir }}" required>
                       
                    </div>
                    <div class="form-group">
                        <label for="edit_kelas">Kelas:</label>
                        <select id="edit_kelas" name="id_kelas" class="form-control">
                            <option value="" disabled selected>Pilih Kelas</option>
                            @foreach($kelas as $kelasItem)
                                <option value="{{ $kelasItem->id }}"{{ isset($murid->id_kelas) && $murid->id_kelas == $kelasItem->id ? 'selected' : '' }}>
                                    {{ $kelasItem->ket_kelas }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="edit_ta">Tahun Angkatan</label>
                        <select class="form-control" id="edit_ta" name="id_ta" required>
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

    <script>
        function openEditModal(nisn,nama,jenis_kelamin,id_kelas,id_ta) {
            var modal = document.getElementById('editModal');
            var edit_action = document.getElementById('edit_action');
            edit_action.action = "/siswa/" + nisn + "/update";
            var nisnInput = document.getElementById('nisn_edit');
            nisnInput.value = nisn;
            var namaInput = document.getElementById('nama_edit');
            namaInput.value = nama;
    
            var jenisKelaminSelect = document.getElementById('edit_jk');
            for (var i = 0; i < jenisKelaminSelect.options.length; i++) {
                if (jenisKelaminSelect.options[i].value === jenis_kelamin) {
                    jenisKelaminSelect.options[i].selected = true;
                }
            }
        
        var pilihkelasSelect = document.getElementById('edit_kelas');
            for (var i = 0; i < pilihkelasSelect.options.length; i++) {
                if (pilihkelasSelect.options[i].value === id_kelas) {
                    pilihkelasSelect.options[i].selected = true;
                }
            }
            var tahunAngkatanSelect = document.getElementById('edit_ta');
            for (var i = 0; i < tahunAngkatanSelect.options.length; i++) {
                if (tahunAngkatanSelect.options[i].value === id_ta) {
                    tahunAngkatanSelect.options[i].selected = true;
                }
            }
        }
    </script>

@endif

    
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
