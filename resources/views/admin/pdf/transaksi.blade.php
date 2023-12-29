<!-- resources/views/pdf/transaksi.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi Tabungan</title>
    <style>
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
        <h2>TRANSAKSI TABUNGAN</h2>
    </center>
    <p>Tanggal : {{ \Carbon\Carbon::now()->format('d F Y') }}</p>
    <table>
        <thead style="background-color: rgb(226, 226, 255)">
            <tr>
                <th>No</th>
                <th>Nama Murid</th>
                <th>Kelas</th>
                <th>Kategori Transaksi</th>
                <th>Tanggal</th>
                <th>Nominal Sekarang</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaksis as $index => $transaksi)
            <tr style="background-color: {{ $transaksi->kategori_transaksi === 'Pengeluaran' ? '#ed6b6b' : 'inherit' }}">                    <td>{{ $index + 1 }}</td>
                    <td>{{ $transaksi->murid }}</td>
                    <td>{{ $transaksi->kelas }}</td>
                    <td>{{ $transaksi->kategori_transaksi }}</td>
                    <td>{{ $transaksi->tanggal }}</td>
                    <td>Rp. {{ number_format($transaksi->nominal, 0, ',', '.') }}</td>
                    <td>Rp. {{ number_format($transaksi->total, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
