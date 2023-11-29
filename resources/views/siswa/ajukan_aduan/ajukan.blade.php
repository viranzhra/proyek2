@extends('siswa.main')

@section('content')
<div class="container">
    <div id="content" class="p-4 p-md-5 pt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card border">
                    <div class="card-header">
                        <h5 class="card-title">Form Aduan</h5>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Siswa</label>
                                <select class="form-select" id="nama" required>
                                    <option value="" selected disabled>Pilih Nama</option>
                                    <option value="putra">Putra</option>
                                    <option value="hurul">Hurul</option>
                                    <option value="vira">Vira</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="kelas" class="form-label">Kelas</label>
                                <select class="form-select" id="kelas" required>
                                    <option value="" selected disabled>Pilih Kelas</option>
                                    <option value="kelas7">Kelas 7</option>
                                    <option value="kelas8">Kelas 8</option>
                                    <option value="kelas9">Kelas 9</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="aduan" class="form-label">Aduan</label>
                                <textarea class="form-control" id="aduan" rows="4" placeholder="Tuliskan aduan Anda" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Kirim Aduan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mt-4">
            <div class="col-md-8">
                <div class="card border">
                    <div class="card-header">
                        <h5 class="card-title">Data Siswa</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive"> <!-- Tambahkan kelas table-responsive -->
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Siswa</th>
                                        <th>Kelas</th>
                                        <th>Isi Aduan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>John Doe</td>
                                        <td>7</td>
                                        <td>contoh isi aduan</td>
                                        <td>
                                            <a href="#" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
                                            <a href="#" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Santi</td>
                                        <td>7</td>
                                        <td>contoh isi aduan</td>
                                        <td>
                                            <a href="#" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
                                            <a href="#" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</a>
                                        </td>
                                    </tr>
                                    <!-- Tambahkan baris sesuai dengan data yang ada -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
