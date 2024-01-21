<!-- Include Quill library -->
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

@extends('admin.main')

@section('content')
<style>
    .ql-toolbar.ql-snow{
        background-color: #e7e7ff;
    }
    .ql-editor {
        background-color: white;
    }
</style>
<div id="content" class="p-4 p-md-5 pt-5">
    <div class="container">
        <div class="card">
            <div class="card-header" style="background-color: #2c8fe5; color: aliceblue;">
                <h4>Edit Daftar Prestasi</h4>
            </div>
            <div class="card-body" style="background-color:#fafafa">
                <form action="{{ route('all-prestasis.update', ['allPrestasi' => $allPrestasi->id]) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="subjudul" class="form-label"><b>Subjudul :</b></label>
                        <input type="text" name="subjudul" class="form-control" value="{{ $allPrestasi->subjudul }}"
                            required>
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi" class="form-label"><b>Deskripsi :</b></label>
                        <div id="editor-deskripsi" style="height: 300px;">{!! $allPrestasi->deskripsi !!}</div>
                        <textarea name="deskripsi" id="deskripsi" style="display:none;"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="foto_tampilan" class="form-label"><b>Foto Tampilan :</b></label>
                        <input type="file" name="foto_tampilan" class="form-control" accept="image/*">
                        @if($allPrestasi->foto_tampilan)
                        <p>File Foto Tampilan Saat Ini: {{ $allPrestasi->foto_tampilan }}</p>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="foto_dokumentasi" class="form-label"><b>Foto Dokumentasi :</b></label>
                        <input type="file" name="foto_dokumentasi" class="form-control" accept="image/*">
                        @if($allPrestasi->foto_dokumentasi)
                        <p>File Foto Dokumentasi Saat Ini: {{ $allPrestasi->foto_dokumentasi }}</p>
                        @endif
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        <a href="/prestasis" class="btn btn-secondary">Kembali</a>
                    </div>
                </form>
            </div>
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
