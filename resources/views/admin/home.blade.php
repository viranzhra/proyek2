@extends('admin.main')

@section('content')
<link rel="stylesheet" href="css/card_dash.css">
<div id="content" class="p-4 pt-5">
    <h2>Selamat Datang {{ Auth::user()->username }}! </h2>
<div class="card-body">
    <div class="tab-content">
        <div class="row">
            <!-- Total Pemasukkan -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Total Pemasukkan</div>
                                <!-- Di dalam file Blade view (misalnya, transaksi.blade.php) -->
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    Rp {{ number_format(app('App\Http\Controllers\TransaksiTabunganController')->getTotalPemasukkan(), 0, ',', '.') }}
                                </div>                            
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Saldo -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Total Saldo Sekarang</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Rp {{ number_format(app('App\Http\Controllers\TransaksiTabunganController')->getTotalSaldo(), 0, ',', '.') }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Pemasukkan -->
            <div class="col-xl-4  col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Pengeluaran
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">Rp {{ number_format(app('App\Http\Controllers\TransaksiTabunganController')->getTotalPengeluaran(), 0, ',', '.') }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Di dalam file Blade view (misalnya, transaksi.blade.php) -->
<div class="row">
    <div class="col-lg-12 mb-4"> <!-- Ganti class col-lg-12 untuk membuat kolom lebih lebar -->
        <div class="card">
            <div class="card-header">
                Grafik Transaksi
            </div>
            <div class="card-body">
                <canvas id="grafikTransaksi"></canvas>
            </div>
        </div>
    </div>
</div>

<script>
    // Di bagian script, tambahkan kode untuk menggambar grafik
    document.addEventListener("DOMContentLoaded", function() {
        var ctx = document.getElementById('grafikTransaksi').getContext('2d');

        var data = {
            labels: ['Pemasukkan', 'Pengeluaran', 'Saldo'],
            datasets: [{
                data: [
                    {{ app('App\Http\Controllers\TransaksiTabunganController')->getTotalPemasukkan() }},
                    {{ app('App\Http\Controllers\TransaksiTabunganController')->getTotalPengeluaran() }},
                    {{ app('App\Http\Controllers\TransaksiTabunganController')->getTotalSaldo() }}
                ],
                backgroundColor: [
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 206, 86, 0.2)'
                ],
                borderColor: [
                    'rgba(75, 192, 192, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(255, 206, 86, 1)'
                ],
                borderWidth: 1
            }]
        };

        var options = {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        };

        var myChart = new Chart(ctx, {
            type: 'bar',
            data: data,
            options: options
        });
    });
</script>

    </div>
  </div>
</div>
</div>
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.19.0/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <!-- Di dalam file Blade view atau layout (misalnya, resources/views/layouts/app.blade.php) -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

@endsection