@extends('admin.main')

@section('content')
<div class="container">
    <div id="content" class="p-4 p-md-5 pt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <b>IDENTITAS SEKOLAH</b>
                    <a href="#" class="btn btn-sm btn-primary float-right" data-toggle="modal" data-target="#editModal">
                        <i class="fa fa-pencil"></i> Edit Identitas Sekolah
                    </a>
                </div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <tbody>
                            {{-- <tr>
                                <th>Logo</th>
                                <td>
                                    @if ($sekolah->logo_path)
                                        <img src="{{ asset('storage/images' . $sekolah->logo_path) }}" alt="Logo" style="max-width: 100px; max-height: 100px;">
                                    @else
                                        No Logo Available
                                    @endif
                                </td>
                            </tr> --}}
                            <tr>
                                <th>Nama Sekolah</th>
                                <td>{{ $sekolah->nama }}</td>
                            </tr>
                            <tr>
                                <th>NPSN</th>
                                <td>{{ $sekolah->npsn }}</td>
                            </tr>
                            <tr>
                                <th>Status Sekolah</th>
                                <td>{{ $sekolah->status_sekolah }}</td>
                            </tr>
                            <tr>
                                <th>SK Pendirian Sekolah</th>
                                <td>{{ $sekolah->sk_pendirian }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal SK Pendirian</th>
                                <td>{{ $sekolah->tgl_sk_pendirian }}</td>
                            </tr>                            <tr>
                                <th>Status Kepemilikan</th>
                                <td>{{ $sekolah->status_kepemilikan }}</td>
                            </tr>
                            <tr>
                                <th>SK Izin Operasional</th>
                                <td>{{ $sekolah->sk_izin_operasional }}</td>
                            </tr>
                            <tr>
                                <th>Tgl SK Izin Operasional </th>
                                <td>{{ $sekolah->tgl_sk_izin_operasional }}</td>
                            </tr>
                            <tr>
                                <th>NPWP</th>
                                <td>{{ $sekolah->npwp }}</td>
                            </tr>
                            <tr>
                                <th>Deskripsi Sekolah</th>
                                <td>{{ $sekolah->deskripsi_sekolah }}</td>
                            </tr>
                            <tr>
                                <th>No. Telepon</th>
                                <td>{{ $sekolah->no_telp }}</td>
                            </tr>
                            <tr>
                                <th>Email Sekolah</th>
                                <td>{{ $sekolah->email_sekolah }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Identitas Sekolah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('sekolah.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    {{-- <div class="form-group">
                        <label for="logo">Nama Sekolah</label>
                        <input type="file" class="form-control" id="logo" name="logo_path" value="{{ $sekolah->logo_path }}">
                    </div> --}}
                    <div class="form-group">
                        <label for="nama">Nama Sekolah</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ $sekolah->nama }}">
                    </div>
                    <div class="form-group">
                        <label for="npsn">NPSN</label>
                        <input type="text" class="form-control" id="npsn" name="npsn" value="{{ $sekolah->npsn }}">
                    </div>
                    <div class="form-group">
                        <label for="status">Status Sekolah</label>
                        <input type="text" class="form-control" id="status" name="status_sekolah" value="{{ $sekolah->status_sekolah }}">
                    </div>
                    <div class="form-group">
                        <label for="nama">SK Pendirian Sekolah</label>
                        <input type="text" class="form-control" id="nama" name="sk_pendirian" value="{{ $sekolah->sk_pendirian }}">
                    </div>
                    <div class="form-group">
                        <label for="nama">Tanggal SK Pendirian</label>
                        <input type="text" class="form-control" id="nama" name="tgl_sk_pendirian" value="{{ $sekolah->tgl_sk_pendirian }}">
                    </div>
                    <div class="form-group">
                        <label for="nama">Status Kepemilikan</label>
                        <input type="text" class="form-control" id="nama" name="status_kepemilikan" value="{{ $sekolah->status_kepemilikan }}">
                    </div>
                    <div class="form-group">
                        <label for="nama">SK Izin Operasional</label>
                        <input type="text" class="form-control" id="nama" name="sk_izin_operasional" value="{{ $sekolah->sk_izin_operasional }}">
                    </div>
                    <div class="form-group">
                        <label for="nama">Tgl SK Izin Operasional</label>
                        <input type="text" class="form-control" id="nama" name="tgl_sk_izin_operasional" value="{{ $sekolah->tgl_sk_izin_operasional }}">
                    </div>
                    <div class="form-group">
                        <label for="nama">NPWP</label>
                        <input type="text" class="form-control" id="nama" name="npwp" value="{{ $sekolah->npwp }}">
                    </div>
                    <div class="form-group">
                        <label for="deskripsi_sekolah">Deskripsi Sekolah</label>
                        <textarea class="form-control" id="deskripsi_sekolah" name="deskripsi_sekolah">{{ $sekolah->deskripsi_sekolah }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="no_telp">No. Telepon</label>
                        <input type="text" class="form-control" id="no_telp" name="no_telp" value="{{ $sekolah->no_telp }}">
                    </div>
                    <div class="form-group">
                        <label for="email_sekolah">Email Sekolah</label>
                        <input type="email" class="form-control" id="email_sekolah" name="email_sekolah" value="{{ $sekolah->email_sekolah }}">
                    </div>          
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" onclick="showSuccessPopup()">Simpan Perubahan</button>                </div>
            </form>
        </div>
    </div>
</div>

<!-- Script untuk menampilkan popup berhasil -->
<script>
    function showSuccessPopup() {
        Swal.fire({
            icon: 'success',
            title: 'Perubahan berhasil disimpan!',
            showConfirmButton: false,
            timer: 6000,
            customClass: {
                title: 'fs-2', // Font size
                popup: 'p-2'    // Padding
            }
        });
    }
</script>
@endsection
