@extends('admin.main')

@section('content')

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">
        <h2 class="mb-4">Data Pemasukkan Kelas 8</h2>

	  <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>NISN</th>
                <th>Nama</th>
				<th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>220908765</td>
                <td>Vira Nur Zahra</td>
				<td><a href="#" style="background-color: green; padding: 5px; border-radius: 5px; color: white;">Tambah Saldo</a></td>
            </tr>
            <tr>
                <td>2</td>
                <td>220908787</td>
                <td>Putra Maulana Ibrahim</td>
				<td><a href="#" style="background-color: green; padding: 5px; border-radius: 5px; color: white;">Tambah Saldo</a></td>
            </tr>
			<tr>
                <td>3</td>
                <td>220908345</td>
                <td>Hurul Aini Putri Prasetya</td>
				<td><a href="#" style="background-color: green; padding: 5px; border-radius: 5px; color: white;">Tambah Saldo</a></td>
            </tr>
        </tbody>
    </table>
 </div>
 @endsection