@extends('admin.main')

@section('content')
        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">
        <h2 class="mb-4">Data Siswa Kelas 8</h2>

	  <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>NISN</th>
                <th>Nama</th>
				<th>Tanggal Lahir</th>
				<th>Alamat</th>
				<th>No.HP</th>
				<th>Orang Tua</th>
				<th>Email</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>220908765</td>
                <td>Vira Nur Zahra</td>
				<td>01 Desember 2003</td>
				<td>Kandanghaur, Indramayu</td>
				<td>089765678987</td>
				<td>Zahra</td>
				<td>viraz12@gmail.com</td>
            </tr>
            <tr>
                <td>2</td>
                <td>220908787</td>
                <td>Putra Maulana Ibrahim</td>
				<td>17 Februari 2001</td>
				<td>Pabean Udik, Indramayu</td>
				<td>089765678987</td>
				<td>Rasmin</td>
				<td>utaaaa12@gmail.com</td>
            </tr>
			<tr>
                <td>3</td>
                <td>220908345</td>
                <td>Hurul Aini Putri Prasetya</td>
				<td>12 September 2003</td>
				<td>Jatibarang</td>
				<td>089765678987</td>
				<td>Prasetya</td>
				<td>hurul13@gmail.com</td>
            </tr>
        </tbody>
    </table>
 </div>
@endsection