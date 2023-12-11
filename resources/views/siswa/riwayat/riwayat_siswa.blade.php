@extends('siswa.main')

@section('content')
<div id="content" class="p-4 p-md-5 pt-5">
    <h2 class="mb-4">Riwayat</h2>

<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <div class="box-body table-responsive">
                <table class="table table-stiped table-bordered">
                    <thead>
                        <th width="5%">No</th>
                        <th>Nama</th>
                        <th>Tanggal</th>
                        <th>Deskripsi</th>
                        <th>Nominal</th>
                    </thead>
                    <tbody>
                        @foreach($murid as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td> 
                                    <td>{{ $row->murid }}</td>
                                    <td>{{ $row->tanggal }}</td>
                                    <td>{{ $row->kategori_transaksi }}</td>
                                    <td>{{ $row->nominal }}</td>
                                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>

@endsection