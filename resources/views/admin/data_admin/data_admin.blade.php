@extends('admin.main')

@section('content')
        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5 pt-5">
            <h2 class="mb-4">Data Admin</h2>
      
            <table id="example" class="table table-striped" style="width: 100%">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>NIP</th>
                  <th>Jabatan</th>
                  <th>Alamat</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Putra Maulana Ibrahim</td>
                  <td>2203082</td>
                  <td>Kepala Sekolah</td>
                  <td>Pabean Udik, Indramayu</td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Vira Nur Zahra</td>
                  <td>2203088</td>
                  <td>Bendahara 1</td>
                  <td>Eretan, Indramayu</td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>Hurul aini putri prasetya</td>
                  <td>2206289</td>
                  <td>Bendahara 2</td>
                  <td>Jati Barang, Indramayu</td>
                </tr>
              </tbody>
            </table>
          </div>
@endsection