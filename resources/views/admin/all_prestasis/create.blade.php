<!-- Include Quill library -->
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

@extends('admin.main')

@section('content')
    <div id="content" class="p-4 p-md-5 pt-5">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Tambah Daftar Prestasi</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('all-prestasis.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="subjudul" class="form-label">Subjudul</label>
                            <input type="text" name="subjudul" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <div id="editor-deskripsi" style="height: 300px;"></div>
                            <input type="hidden" name="deskripsi" id="deskripsi" required>
                        </div>

                        <div class="mb-3">
                            <label for="foto_tampilan" class="form-label">Foto Tampilan</label>
                            <input type="file" name="foto_tampilan" class="form-control" accept="image/*" required>
                        </div>

                        <div class="mb-3">
                            <label for="foto_dokumentasi" class="form-label">Foto Dokumentasi</label>
                            <input type="file" name="foto_dokumentasi" class="form-control" accept="image/*" required>
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="/prestasis" class="btn btn-secondary">Kembali</a>
                        </div>
                    </form>
                </div>
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
