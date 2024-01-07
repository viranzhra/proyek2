<!-- Include Quill library -->
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

@extends('admin.main')

@section('content')
<div id="content" class="p-4 p-md-5 pt-5">
    <div class="card">
            <div class="card-header">
                <h2 class="card-title">Tambah Eskul</h2>
            </div>
            <div class="card-body">

                <form action="{{ route('eskuls.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="subjudul">Subjudul:</label>
                        <input type="text" name="subjudul" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <div id="editor-deskripsi" style="height: 300px;"></div>
                        <input type="hidden" name="deskripsi" id="deskripsi" required>
                    </div>

                    <div class="form-group">
                        <label for="foto_tampilan">Foto Tampilan:</label>
                        <input type="file" name="foto_tampilan" class="form-control-file" accept="image/*" required>
                    </div>

                    <div class="form-group">
                        <label for="foto_dokumentasi1">Foto Dokumentasi 1:</label>
                        <input type="file" name="foto_dokumentasi1" class="form-control-file" accept="image/*">
                    </div>

                    <div class="form-group">
                        <label for="foto_dokumentasi2">Foto Dokumentasi 2:</label>
                        <input type="file" name="foto_dokumentasi2" class="form-control-file" accept="image/*">
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-between">
                        <button type="submit" class="btn btn-primary me-md-2">Simpan</button>
                        <a href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

        <!-- Script untuk Quill editor -->
        <script>
            // Script untuk Quill editor
            var quillDeskripsi = new Quill('#editor-deskripsi', {
                theme: 'snow',
                placeholder: 'Tulis deskripsi disini...',
            });
    
            // Event listener saat formulir disubmit
            document.querySelector('form').addEventListener('submit', function () {
                // Set nilai input tersembunyi sesuai dengan konten Quill pada deskripsi
                document.querySelector('#deskripsi').value = quillDeskripsi.root.innerHTML;
            });
    
            // Optional: Update deskripsi saat kontennya berubah (jika diperlukan)
            quillDeskripsi.on('text-change', function () {
                document.querySelector('#deskripsi').value = quillDeskripsi.root.innerHTML;
            });
        </script>
@endsection
