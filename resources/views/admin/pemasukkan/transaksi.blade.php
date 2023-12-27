@extends('admin.main')

@section('content')
    <!-- Page Content  -->
    <div id="content" class="p-4 p-md-5 pt-5">
        <div class="card mt-4">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="mb-">
                        <label for="kelas" class="mr-2" style="font-weight: bold">Pilih Kelas:</label>
                        <select id="kelas" name="selectedClass" class="btn btn-primary" onchange="redirectToClass()">
                            <option value="" disabled selected>Semua Kelas</option>
                            <option value="7A" {{ request('search') == '7A' ? 'selected' : '' }}>Kelas 7A</option>
                            <option value="7B" {{ request('search') == '7B' ? 'selected' : '' }}>Kelas 7B</option>
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
                    <div class="mb-3">
                        <div class="input-group">
                            <div class="form-outline" data-mdb-input-init>
                                <form action="{{ route('transaksi-tabungan.index') }}" method="get">
                                    @csrf
                                    <input type="search" name="search" id="form1" class="form-control" placeholder="Search"/>
                            </div>
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary" data-mdb-ripple-init>
                                    <i class="fas fa-search"></i>
                                </button>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-header">
                <div class="mb-">
                    <h4 id="kelasHeading" class="m-0">Data Siswa</h4>
                </div>
                <a href="" data-toggle="modal" data-target="#tambahModal" style="float: right; margin-top: -30px;">
                    <img src="{{ asset('image/topup-saldo.png') }}" alt="" width="25px"> <b>Tambah Saldo</b>
                </a>
                <a href="{{ route('download-pdf', ['selectedClass' => $selectedClass ?? '']) }}" style="float: right; margin-top: -30px; margin-right: 150px;">
                    <img src="{{ asset('image/icon_pdf.png') }}" alt="" width="25px"> <b>Download</b>
                </a> 
            </div>
            <div class="card-body">
            <form action="{{ route('transaksi-tabungan.index') }}" method="get">
                @csrf <!-- Tambahkan ini untuk melindungi formulir dari serangan Cross-Site Request Forgery (CSRF) -->
                <center>
                    @if (isset($searchDate))
                        <b style="color: rgb(65, 65, 154)">{{ \Carbon\Carbon::parse($searchDate)->format('l, d F Y') }}</b>
                    @endif
                </center>

                <div class="form-group col-md-3">
                        <label for="search_date"><b>Cari berdasarkan tanggal: </b></label>
                        <div class="input-group">
                            <input type="date" class="form-control" id="search_date" name="search_date">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
    
                <div class="table-responsive">
                @if (session('success'))
                    <div id="success-alert" class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                    <table id="example" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>Deskripsi</th>
                                <th>Tanggal Transaksi</th>
                                <th>Nominal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($transaksis as $pemasukkan)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $pemasukkan->nama_murid }}</td>
                                    <td>{{ $pemasukkan->kelas }}</td>
                                    <td>{{ $pemasukkan->kategori_transaksi }}</td>
                                    <td>{{ $pemasukkan->tanggal }}</td>
                                    <td>Rp. {{ number_format($pemasukkan->nominal, 0, ',', '.') }}</td>
                                    <td>
                                        <a type="button" title="Saldo" data-toggle="modal" data-target="#tambahData" onclick="openTambahModal('{{ $pemasukkan->nisn_murid }}', '{{ $pemasukkan->nama_murid }}', '{{ $pemasukkan->kelas }}')">
                                            <img src="{{ asset('image/topup-saldo.png') }}" alt="" width="30px">
                                        </a>
                                        <button type="button" class="btn btn-success btn-sm" title="Edit" data-toggle="modal" data-target="#editModal" onclick="openEditModal('{{ $pemasukkan->nisn_murid }}', '{{ $pemasukkan->nama_murid }}', '{{ $pemasukkan->id_kelas }}', '{{ $pemasukkan->kategori_transaksi }}', '{{ $pemasukkan->tanggal }}', '{{ $pemasukkan->nominal }}')">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" class="text-center">No data available</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="card-footer">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="text-muted">
                                Showing {{ $transaksis->firstItem() }} to {{ $transaksis->lastItem() }} of {{ $transaksis->total() }} results
                        </div>
                        <div>
                                {{ $transaksis->links() }}
                        </div>
                    </div>
                </div>
            </div>
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
                <form action="{{ route('transaksi-tabungan.store') }}" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="id_siswa" class="form-label">Nama Murid</label>
                        <select class="form-select" id="id_siswa" name="id_siswa" required>
                            <option value="" disabled selected>Pilih Nama Siswa</option>
                            @foreach($murids as $murid)
                                <option value="{{ $murid->id }}">{{ $murid->nama_murid }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="pilihkelas">Kelas</label>
                        <select class="form-control" id="pilihkelas" name="id_kelas" required readonly>
                            <option value="" disabled selected>Pilih Kelas</option>
                            @foreach ($kelas as $kelasItem)
                                <option value="{{ $kelasItem->id }}">{{ $kelasItem->ket_kelas }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="id_kategori" class="form-label">Deskripsi</label>
                        <select class="form-select" id="id_kategori" name="id_kategori" required>
                            <option value="" disabled selected>Pilih Kategori</option>
                            @foreach($kategoriTransaksis as $kategori)
                                <option value="{{ $kategori->id }}">{{ $kategori->deskripsi }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="tanggal" class="form-label">Tanggal Transaksi</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                    </div>

                    <div class="form-group">
                        <label for="nominal" class="form-label">Nominal</label>
                        <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="number" class="form-control" id="nominal" name="nominal" step="0.01" required>
                        </div>
                        <small id="nominalHelp" class="form-text text-muted">Contoh: 10000</small>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

@if ($transaksis->count() > 0)
<!-- Modal tambah Data pada icon -->
<div class="modal fade" id="tambahData" tabindex="-1" aria-labelledby="tambahDataLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahDataLabel">Transaksi Saldo Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form tambah Data pada icon -->
                <form id="tambah_action" class="edit-action-form" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="nama_tambah">Nama</label>
                        <input type="text" class="form-control" id="nama_tambah" name="id_siswa" readonly>
                    </div>

                    <div class="form-group">
                        <label for="tambah_kelas">Kelas</label>
                        <input type="text" class="form-control" id="tambah_kelas" name="id_kelas" readonly>
                    </div>

                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <select class="form-select" id="deskripsi" name="id_kategori" required>
                            <option value="" disabled selected>Pilih Kategori</option>
                            @foreach($kategoriTransaksis as $kategori)
                                <option value="{{ $kategori->id }}">{{ $kategori->deskripsi }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="transaksi_tgl">Tanggal Transaksi</label>
                        <input type="date" class="form-control" id="transaksi_tgl" name="tanggal" required>
                    </div>

                    <div class="form-group">
                        <label for="nominal_tambah" class="form-label">Nominal</label>
                        <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="number" class="form-control" id="nominal_tambah" name="nominal" step="0.01" required>
                        </div>
                        <small id="nominalHelp" class="form-text text-muted">Contoh: 10000</small>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- <!-- Modal Delete -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Penghapusan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Pesan konfirmasi akan ditampilkan di sini -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <form id="delete_action" method="post" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div> --}}

<!-- Modal Edit Data -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Data Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form edit data siswa -->
                <form id="edit_action" class="edit-action-form" method="post">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="nama_edit">Nama</label>
                        <input type="text" class="form-control" id="nama_edit" name="id_siswa" required>
                    </div>

                    <div class="form-group">
                        <label for="edit_kelas">Kelas:</label>
                        <select id="edit_kelas" name="id_kelas" class="form-control">
                            <option value="" disabled selected>Pilih Kelas</option>
                            @foreach($kelas as $kelasItem)
                            <option value="{{ $kelasItem->id }}" {{ isset($pemasukkan->id_kelas) && $pemasukkan->id_kelas == $kelasItem->id ? 'selected' : '' }}>
                                {{ $kelasItem->ket_kelas }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="edit_deskripsi">Deskripsi</label>
                        <select class="form-control" id="edit_deskripsi" name="id_kategori" required>
                            <option value="" disabled selected>Kategori Transaksi</option>
                            @foreach($kategoriTransaksis as $kategori)
                            <option value="{{ $kategori->id }}" {{ isset($pemasukkan->id_kategori) && $pemasukkan->id_kategori == $kategori->id ? 'selected' : '' }}>
                                {{ $kategori->deskripsi }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="tgl_transaksi">Tanggal Transaksi</label>
                        <input type="date" class="form-control" id="tgl_transaksi" name="tanggal" required>
                    </div>

                    <div class="form-group">
                        <label for="nominal_edit">Nominal</label>
                        <input type="text" class="form-control" id="nominal_edit" name="nominal" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endif

<script>
    function openTambahModal(nisn, nama_murid, id_kelas) {
        var modal = document.getElementById('tambahData');
        var tambah_action = document.getElementById('tambah_action');
        tambah_action.action = "/transaksi-tabungan/" + nisn + "/tambah-saldo";
        var muridInput = document.getElementById('nama_tambah');
        muridInput.value = nama_murid;

        var kelasInput = document.getElementById('tambah_kelas');
        kelasInput.value = id_kelas;

    }
</script>


<script>
    function openEditModal(nisn, nama_murid, id_kelas, kategori_transaksi, tanggal, nominal) {
        var modal = document.getElementById('editModal');
        var edit_action = document.getElementById('edit_action');
        edit_action.action = "/transaksi-tabungan/" + nisn + "/update";
        var muridInput = document.getElementById('nama_edit');
        muridInput.value = nama_murid;
        var transaksiInput = document.getElementById('tgl_transaksi');
        transaksiInput.value = tanggal;
        var nominalInput = document.getElementById('nominal_edit');

        nominalInput.value = nominal;

        var pilihkelasSelect = document.getElementById('edit_kelas');
        for (var i = 0; i < pilihkelasSelect.options.length; i++) {
            if (pilihkelasSelect.options[i].value === id_kelas) {
                pilihkelasSelect.options[i].selected = true;
            }
        }
        var deskripsiSelect = document.getElementById('edit_deskripsi');
        for (var i = 0; i < deskripsiSelect.options.length; i++) {
            if (deskripsiSelect.options[i].value === kategori_transaksi) {
                deskripsiSelect.options[i].selected = true;
            }
        }
    }
</script>

<script>
    function openDeleteModal(nisn, nama) {
        var modal = document.getElementById('deleteModal');
        var deleteAction = document.getElementById('delete_action');
        deleteAction.action = "/transaksi-tabungan/" + nisn + "/destroy";
        
        // Set pesan konfirmasi di dalam modal
        var modalBody = modal.querySelector('.modal-body');
        modalBody.innerHTML = "Apakah Anda yakin ingin menghapus data " + nama + "?";

        // Tampilkan modal
        $(modal).modal('show');
    }
</script>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

        <!-- Include Bootstrap Datepicker -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
        <!-- Bootstrap Icons -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.19.0/font/bootstrap-icons.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
        <script>
            // Initialization for ES Users
            import { Input, Ripple, initMDB } from "mdb-ui-kit";

            initMDB({ Input, Ripple });
        </script>

    <script>
        function redirectToClass() {
            var selectedValue = document.getElementById('kelas').value;
            var headingElement = document.getElementById("kelasHeading");
            var redirectURL = "{{ route('download-pdf') }}?selectedClass=" + encodeURIComponent(selectedValue);        
            var redirectURL = "?search=" + encodeURIComponent(selectedValue);
            window.location.href = redirectURL;
        }
    </script>

    <script>
        // Auto-hide success alert after 3 seconds
        $(document).ready(function () {
            setTimeout(function () {
                $("#success-alert").alert('close');
            }, 3000);
        });
    </script>
@endsection

