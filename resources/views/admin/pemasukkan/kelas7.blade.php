@extends('admin.main')

@section('content')
    <!-- Page Content  -->
    <div id="content" class="p-4 p-md-5 pt-5">
        <div class="card mt-4">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="mb- d-flex align-items-center">
                        <label for="kelas" class="mr-2 d-inline" style="font-weight: bold">Pilih Kelas:</label>
                        <select id="kelas" class="btn btn-primary" onchange="redirectToClass()">
                            <option value="7A">Kelas 7A</option>
                            <option value="7B">Kelas 7B</option>
                            <option value="7C">Kelas 7C</option>
                            <option value="7D">Kelas 7D</option>
                        </select>
                        
                        <div class="input-group ml-3">
                            <div class="form-outline" data-mdb-input-init>
                                <input type="search" id="form1" class="form-control" placeholder="Search"/>
                            </div>
                            <button type="button" class="btn btn-primary" data-mdb-ripple-init>
                                <i class="fas fa-search"></i>
                            </button>
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
                <a href="/pemasukkan-tabungan/create" style="float: right; margin-top: -30px;"><img src="image/topup-saldo.png" alt="" width="25px"> Tambah Saldo</a>
                <a href="#" style="float: right; margin-top: -30px; margin-right: 130px;"><img src="image/icon_excel.png" alt="" width="25px"> Download</a>
            </div>
            <div class="card-body">
                <div class="input-group" style="margin-bottom: 20px;">
                    <div class="form-outline" data-mdb-input-init>
                        <input type="text" id="datepicker" class="form-control" placeholder="Search by Date" />
                    </div>
                    <button type="button" class="btn btn-primary" onclick="searchByDate()">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
    
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Tanggal Pemasukkan</th>
                            <th>Nominal</th>
                            <th>Total</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pemasukkanTabungan as $index => $pemasukkan)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $pemasukkan->murid }}</td>
                                <td>{{ $pemasukkan->tanggal_pemasukkan }}</td>
                                <td>{{ $pemasukkan->nominal }}</td>
                                <td>{{ $pemasukkan->total }}</td>
                                <td>
                                    <a href="/pemasukkan-tabungan/create" data-toggle="tooltip" data-placement="top" title="Tambah Saldo">
                                        <img src="image/topup-saldo.png" width="30px" alt="">
                                    </a>
                                    <a href="#" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="#" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Delete">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        
        <script>
            function redirectToClass() {
                var selectedClass = document.getElementById("kelas").value;
                var headingElement = document.getElementById("kelasHeading");
                headingElement.innerText = "Data Siswa Kelas " + selectedClass;
                
                // Redirect to the selected class URL
                window.location.href = "/kelas?search=" + selectedClass.toLowerCase();
            }
        </script>
        <!-- Include Bootstrap Datepicker -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
        
        <script>
            // Initialize Bootstrap Datepicker
            $(document).ready(function () {
                $('#datepicker').datepicker({
                    format: 'mm/dd/yyyy',
                    autoclose: true
                });
            });
        
            // Function to handle search by date
            function searchByDate() {
                // Add your logic here to perform the search based on the selected date
                var selectedDate = $('#datepicker').val();
                console.log('Searching for date: ' + selectedDate);
            }
        </script>
        
        
        </div>
   <!-- Bootstrap Icons -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.19.0/font/bootstrap-icons.css" rel="stylesheet">
   <!-- Font Awesome -->
   <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <script>
        // Initialization for ES Users
        import { Input, Ripple, initMDB } from "mdb-ui-kit";

        initMDB({ Input, Ripple });
    </script>
 @endsection
