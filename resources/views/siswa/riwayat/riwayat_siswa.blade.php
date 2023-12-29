@extends('siswa.main')

@section('content')
<div id="content" class="p-4 p-md-5 pt-5">
    <div class="card mt-4">
        <div class="card-header">
            <div class="mb-">
                <h4 id="kelasHeading" class="m-0">Riwayat</h4>
            </div>
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
                        @foreach($transaksiTabungan as $index => $transaksi)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $transaksi->deskripsi }}</td>
                            <td>{{ $transaksi->tanggal_transaksi }}</td>
                            <td>Rp. {{ number_format($transaksi->nominal, 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        <!-- Include Bootstrap Datepicker -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
        <!-- Bootstrap Icons -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.19.0/font/bootstrap-icons.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
@endsection