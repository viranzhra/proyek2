<!-- Include Quill library -->
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

@extends('admin.main')

@section('content')
<div id="content" class="p-4 p-md-5 pt-5">
    <div class="card">
            <div class="card-header">
                <h2 class="card-title">Edit Ekstrakurikuler</h2>
            </div>
            <div class="card-body">

                <form action="{{ route('eskuls.update', $eskul->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="subjudul">Subjudul:</label>
                        <input type="text" name="subjudul" class="form-control" value="{{ $eskul->subjudul }}" required>
                    </div>

                    <div class="form-group">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <div id="editor-deskripsi" style="height: 300px;">{!! $eskul->deskripsi !!}</div>
                        <textarea name="deskripsi" id="deskripsi" style="display:none;"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="foto_tampilan">Foto Tampilan:</label>
                        <input type="file" name="foto_tampilan" class="form-control-file" accept="image/*">
                        
                        <!-- Tampilkan foto yang sebelumnya diupload jika ada -->
                        @if($eskul->foto_tampilan)
                            <p>Foto Tampilan Sebelumnya:</p>
                            <img src="{{ asset('uploads/' . $eskul->foto_tampilan) }}" alt="Foto Tampilan Sebelumnya" style="max-width: 200px;">
                        @else
                            <p>Tidak ada foto tampilan sebelumnya.</p>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="foto_dokumentasi1">Foto Dokumentasi 1:</label>
                        <input type="file" name="foto_dokumentasi1" class="form-control-file" accept="image/*">
                        
                        <!-- Tampilkan foto yang sebelumnya diupload jika ada -->
                        @if($eskul->foto_dokumentasi1)
                            <p>Foto Dokumentasi 1 Sebelumnya:</p>
                            <img src="{{ asset('uploads/' . $eskul->foto_dokumentasi1) }}" alt="Foto Dokumentasi 1 Sebelumnya" style="max-width: 200px;">
                        @else
                            <p>Tidak ada foto dokumentasi 1 sebelumnya.</p>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="foto_dokumentasi2">Foto Dokumentasi 2:</label>
                        <input type="file" name="foto_dokumentasi2" class="form-control-file" accept="image/*">
                        
                        <!-- Tampilkan foto yang sebelumnya diupload jika ada -->
                        @if($eskul->foto_dokumentasi2)
                            <p>Foto Dokumentasi 2 Sebelumnya:</p>
                            <img src="{{ asset('uploads/' . $eskul->foto_dokumentasi2) }}" alt="Foto Dokumentasi 2 Sebelumnya" style="max-width: 200px;">
                        @else
                            <p>Tidak ada foto dokumentasi 2 sebelumnya.</p>
                        @endif
                    </div>


                    <div class="d-grid gap-2 d-md-flex justify-content-md-between">
                        <button type="submit" class="btn btn-primary me-md-2">Simpan Perubahan</button>
                        <a href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Script untuk Quill editor -->
<script>
    // Inisialisasi Quill untuk bagian Deskripsi
    var quillDeskripsi = new Quill('#editor-deskripsi', {
        theme: 'snow',
        placeholder: 'Tulis deskripsi disini...',
    });

    // Fungsi callback yang dipanggil saat kontennya berubah pada deskripsi
    function handleDeskripsiChange() {
        // Set nilai input tersembunyi sesuai dengan konten Quill pada deskripsi
        document.querySelector('#deskripsi').value = quillDeskripsi.root.innerHTML;
    }

    // Inisialisasi MutationObserver untuk deskripsi
    var observerDeskripsi = new MutationObserver(handleDeskripsiChange);

    // Amati editor Quill untuk perubahan konten pada deskripsi
    observerDeskripsi.observe(quillDeskripsi.root, { childList: true, subtree: true });

    // Event listener saat formulir disubmit
    document.querySelector('form').onsubmit = function () {
        // Panggil fungsi untuk menangani perubahan konten pada deskripsi
        handleDeskripsiChange();
    };

</script>
@endsection
