@extends('admin.main')

@section('content')
    <div class="container">
        <div id="content" class="p-4 p-md-5 pt-5">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="mb-">
                            <h3>Data Arsip Tabungan</h3>
                        </div>
                        <div class="mb-">
                            <label for="kelas" class="mr-2" style="font-weight: bold">Pilih Kelas:</label>
                            <select id="kelas" class="btn btn-primary" onchange="redirectToClass()">
                                <option value="" disabled selected>Semua Kelas</option>
                                <option value="7A" {{ request('search') == '7A' ? 'selected' : '' }}>Kelas 7A</option>
                                <option value="7B" {{ request('search') == '7B' ? 'selected' : '' }}>Kelas 7B</option>
                                <option value="7C" {{ request('search') == '7C' ? 'selected' : '' }}>Kelas 7C</option>
                                <option value="7D" {{ request('search') == '7D' ? 'selected' : '' }}>Kelas 7D</option>
    
                                <option value="8A" {{ request('search') == '8A' ? 'selected' : '' }}>Kelas 8A</option>
                                <option value="8B" {{ request('search') == '8B' ? 'selected' : '' }}>Kelas 8B</option>
                                <option value="8C" {{ request('search') == '8C' ? 'selected' : '' }}>Kelas 8C</option>
                                <option value="8D" {{ request('search') == '8D' ? 'selected' : '' }}>Kelas 8D</option>
    
                                <option value="9A" {{ request('search') == '9A' ? 'selected' : '' }}>Kelas 9A</option>
                                <option value="9B" {{ request('search') == '9B' ? 'selected' : '' }}>Kelas 9B</option>
                                <option value="9C" {{ request('search') == '9C' ? 'selected' : '' }}>Kelas 9C</option>
                            </select>
                        </div>
                    </div>                
                </div>
                <div class="card-body">
                    <!-- Search Form -->
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <form action="{{ route('arsipan.index') }}" method="get">
                                    @csrf <!-- Tambahkan ini untuk melindungi formulir dari serangan Cross-Site Request Forgery (CSRF) -->
                                    <label for="search_date"><b>Cari berdasarkan tanggal: </b></label>
                                    <div class="input-group">
                                        <input type="date" class="form-control" id="search_date" name="search_date" value="{{ $searchDate ?? '' }}">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        
                            <div class="form-group col-md-3">
                                <label for="start_date"><b>Mulai Tanggal: </b></label>
                                <div class="input-group">
                                    <input type="date" class="form-control" id="start_date" name="start_date" value="{{ $startDate ?? '' }}">
                                </div>
                            </div>
                    
                            <!-- Add a date range input for end date -->
                            <div class="form-group col-md-3">
                                <label for="end_date"><b>Sampai Tanggal: </b></label>
                                <div class="input-group">
                                    <input type="date" class="form-control" id="end_date" name="end_date" value="{{ $endDate ?? '' }}">
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <button type="submit" class="btn btn-success">Cari</button>
                                <a href="{{ route('arsipan.downloadPdf', ['search_date' => $searchDate ?? '', 'weekly' => $weekly ?? '', 'monthly' => $monthly ?? '', 'kelas_filter' => $kelasFilter ?? '']) }}" class="btn btn-success">Download</a>
                            </div>
                        </div>
                    </form>

                    <br>

                    <!-- Display Table -->
                    @if(count($arsipTabungan) > 0)
                    <div class="table-responsive">
                        <table id="example" class="table table-striped" style="width:100%">
                                <thead>
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
                        </div>
                    @else
                        <div class="alert alert-info" role="alert">
                            Tidak ada arsip tabungan.
                        </div>
                    @endif
                </div>

                <div class="card-footer">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="text-muted">
                                Showing {{ $arsipTabungan->firstItem() }} to {{ $arsipTabungan->lastItem() }} of {{ $arsipTabungan->total() }} results
                        </div>
                        <div>
                                {{ $arsipTabungan->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.19.0/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
@endsection
