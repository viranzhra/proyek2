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
                                <form action="{{ route('ajukan-aduan.index') }}" method="get">
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
                    <h4 id="kelasHeading" class="m-0">Data Aduan Siswa</h4>
                </div>
                <a href="{{ route('download-pdf', ['selectedClass' => $selectedClass ?? '']) }}" style="float: right; margin-top: -30px;">
                    <img src="{{ asset('image/icon_pdf.png') }}" alt="" width="25px"> <b>Download</b>
                </a> 
            </div>
            <div class="card-body">
            <form action="{{ route('ajukan-aduan.index') }}" method="get">
                @csrf <!-- Tambahkan ini untuk melindungi formulir dari serangan Cross-Site Request Forgery (CSRF) -->
    
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
                                <th>Kategori Aduan</th>
                                <th>Aduan</th>
                                <th>Bukti Aduan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($aduanSiswa as $aduan)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $aduan->nama_murid }}</td>
                                    <td>{{ $aduan->kelas }}</td>
                                    <td>{{ $aduan->kategori_aduan }}</td>
                                    <td>{{ $aduan->aduan }}</td>
                                    <td>
                                    @if ($aduan->bukti_aduan)
                                        <img src="{{ asset('storage/bukti_aduan/'.$aduan->bukti_aduan) }}" alt="Bukti Aduan" width="50">
                                    @else
                                        No Image
                                    @endif
                                    </td>                                    
                                    <td>
                                        <button type="button" class="btn btn-info btn-sm view-btn" data-toggle="modal" data-target="#viewModal" onclick="openViewModal('{{ $aduan->nama_murid }}', '{{ $aduan->kelas }}', '{{ $aduan->kategori_aduan }}', '{{ $aduan->aduan }}', '{{ $aduan->bukti_aduan }}')">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal" data-id="{{ $aduan->id }}">
                                            <i class="fas fa-trash-alt"></i>
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
                                Showing {{ $aduanSiswa->firstItem() }} to {{ $aduanSiswa->lastItem() }} of {{ $aduanSiswa->total() }} results
                        </div>
                        <div>
                                {{ $aduanSiswa->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>


{{-- <!-- Modal Hapus -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $aduan->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel{{ $aduan->id }}">Hapus Aduan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus aduan ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <form action="{{ route('aduan.destroy', $aduan->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div> --}}

<!-- Modal View Data -->
<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewModalLabel">Detail Aduan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <tbody>
                        <tr>
                            <th scope="row">Nama Murid</th>
                            <td><span id="nama_murid_view"></span></td>
                        </tr>
                        <tr>
                            <th scope="row">Kelas</th>
                            <td><span id="kelas_view"></span></td>
                        </tr>
                        <tr>
                            <th scope="row">Kategori Aduan</th>
                            <td><span id="kategori_aduan_view"></span></td>
                        </tr>
                        <tr>
                            <th scope="row">Aduan</th>
                            <td><span id="aduan_view"></span></td>
                        </tr>
                        <tr>
                            <th scope="row">Bukti Aduan</th>
                            <td><span id="bukti_aduan_image"></span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    function openViewModal(nama, kelas, kategori, aduan, bukti) {
        document.getElementById('nama_murid_view').innerHTML = nama;
        document.getElementById('kelas_view').innerHTML = kelas;
        document.getElementById('kategori_aduan_view').innerHTML = kategori;
        document.getElementById('aduan_view').innerHTML = aduan;

        /*var buktiAduanImage = document.getElementById('bukti_aduan_image');
        if (buktiAduan) {
            buktiAduanImage.src = "path/to/bukti_aduan/" + buktiAduan;
        } else {
            buktiAduanImage.src = "path/to/default/image.jpg";
        }*/
    }
</script>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.7.0/dist/js/bootstrap.bundle.min.js"></script>
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

