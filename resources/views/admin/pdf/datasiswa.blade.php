<!-- datasiswa.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
    <style>
        /* Add your custom styles here */
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #2a2a2a;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color:  rgb(226, 226, 255);
        }

        h2 {
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>Data Siswa</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>NISN</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Tanggal Lahir</th>
                <th>Kelas</th>
                <th>Tahun Angkatan</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($datasiswa as $siswa)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $siswa->nisn_murid }}</td>
                    <td>{{ $siswa->nama_murid }}</td>
                    <td>{{ $siswa->jenis_kelamin }}</td>
                    <td>{{ $siswa->tgl_lahir }}</td>
                    <td>{{ $siswa->kelas }}</td>
                    <td>{{ $siswa->tahun_angkatan }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" style="text-align: center;">No data available</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
