<!DOCTYPE html>
<html>
<head>
    <title>Arsip Tabungan</title>
    <style>
        /* Tambahkan gaya CSS sesuai kebutuhan Anda */
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #454545;
            text-align: left;
            padding: 8px;
        }
    </style>
</head>
<body>
    <center>
        <h2>DATA ARSIP TABUNGAN SISWA</h2>
    </center>

    <p>Tanggal: {{ \Carbon\Carbon::now()->format('d F Y') }}</p>

    <table>
        <thead style="background-color: rgb(226, 226, 255)">
            <tr>
                <th>No.</th>
                <th>Nama Siswa</th>
                <th>Kelas</th>
                <th>Tanggal</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($arsipTabungan as $index => $arsip)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $arsip->murid }}</td>
                    <td>{{ $arsip->kelas }}</td>
                    <td>{{ $arsip->tanggal_arsip }}</td>
                    <td>Rp. {{ number_format($arsip->total, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
