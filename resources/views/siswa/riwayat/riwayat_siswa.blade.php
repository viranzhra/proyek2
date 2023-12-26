@extends('siswa.main')

@section('content')
<div id="content" class="p-4 p-md-5 pt-5">
    <div class="card mt-4">
        <div class="card-header">
            <div class="mb-">
                <h4 id="kelasHeading" class="m-0">Riwayat</h4>
            </div>
        <div class="card-body">
            <div class="form-group col-md-3">
                <form action="{{ route('transaksi-tabungan.index') }}" method="get">
<!-- Tambahkan ini untuk melindungi formulir dari serangan Cross-Site Request Forgery (CSRF) -->
                    <label for="search_date"><b>Cari berdasarkan tanggal: </b></label>
                    <div class="input-group">
                        <input type="date" class="form-control" id="search_date" name="search_date" value="{{ $searchDate ?? '' }}">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            

            <div class="table-responsive">
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Deskripsi</th>
                            <th>Tanggal Transaksi</th>
                            <th>Nominal</th>
                        </tr>
                    </thead>
                    <tbody>
                            <tr>
                                <td>1</td>
                                <td>pemasukkan</td>
                                <td>12/09/2023</td>
                                <td>Rp. 50000</td>
                            </tr>
                    </tbody>
                </table>
            </div>

@endsection