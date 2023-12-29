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
                            <select id="kelas" name="selectedClass" class="btn btn-primary" onchange="redirectToClass()">
                                <option value="" disabled selected>Semua Kelas</option>
                                <option value="7A" {{ request('kelas') == '7A' ? 'selected' : '' }}>Kelas 7A</option>
                                <option value="7B" {{ request('kelas') == '7B' ? 'selected' : '' }}>Kelas 7B</option>
                                <option value="7C" {{ request('kelas') == '7C' ? 'selected' : '' }}>Kelas 7C</option>
                                <option value="7D" {{ request('kelas') == '7D' ? 'selected' : '' }}>Kelas 7D</option>
    
                                <option value="8A" {{ request('kelas') == '8A' ? 'selected' : '' }}>Kelas 8A</option>
                                <option value="8B" {{ request('kelas') == '8B' ? 'selected' : '' }}>Kelas 8B</option>
                                <option value="8C" {{ request('kelas') == '8C' ? 'selected' : '' }}>Kelas 8C</option>
                                <option value="8D" {{ request('kelas') == '8D' ? 'selected' : '' }}>Kelas 8D</option>
    
                                <option value="9A" {{ request('kelas') == '9A' ? 'selected' : '' }}>Kelas 9A</option>
                                <option value="9B" {{ request('kelas') == '9B' ? 'selected' : '' }}>Kelas 9B</option>
                                <option value="9C" {{ request('kelas') == '9C' ? 'selected' : '' }}>Kelas 9C</option>
                            </select>
                        </div>
                    </div>                
                </div>
                <div class="card-body">
                    <!-- Search Form -->
                        <div class="form-row">
                            <div class="form-group col-md-5">
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

                            <div class="form-group col-md-7">
                                <a style="float: right;" href="{{ route('arsipan.downloadPdf', ['search_date' => $searchDate ?? '', 'weekly' => $weekly ?? '', 'monthly' => $monthly ?? '', 'kelas_filter' => $kelasFilter ?? '']) }}" class="btn btn-success">Download</a>
                            </div>
                        </div>
                    </form>

                    <br>

                    <!-- Display Table -->
            
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
                                    @forelse ($arsipTabungan as $index => $arsip)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $arsip->murid }}</td>
                                            <td>{{ $arsip->kelas }}</td>
                                            <td>{{ $arsip->tanggal_arsip }}</td>
                                            <td>Rp. {{ number_format($arsip->total, 0, ',', '.') }}</td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="8" class="text-center">No data available</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
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

    <script>
        function redirectToClass() {
            var selectedValue = document.getElementById('kelas').value;
            var headingElement = document.getElementById("kelasHeading");
            headingElement.innerText = "Data Siswa Kelas " + selectedValue;
            var redirectURL = "?kelas=" + encodeURIComponent(selectedValue);
            window.location.href = redirectURL;
        }
    </script>

        <!-- Include Bootstrap Datepicker -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
        <!-- Bootstrap Icons -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.19.0/font/bootstrap-icons.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
@endsection
