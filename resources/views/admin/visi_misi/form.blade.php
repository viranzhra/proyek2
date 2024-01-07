<!-- Include Quill stylesheet -->
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

@extends('admin.main')

@section('content')
<style>
    .ql-toolbar.ql-snow{
        background-color: #e7e7ff;
    }
</style>
<div id="content" class="p-4 p-md-5 pt-5">
    <div class="card">
            <div class="card-header">
                <h2 class="h5">{{ isset($data) ? 'Edit' : 'Tambah' }} Data Visi Misi</h2>
            </div>
            <div class="card-body">
                @if(isset($data))
                    <form action="{{ route('visi_misi.update', $data->id) }}" method="POST">
                        @method('PUT')
                @else
                    <form action="{{ route('visi_misi.store') }}" method="POST">
                @endif
                        @csrf

                        <div class="form-group">
                            <label for="judul_halaman"><b>Judul Halaman:</b></label>
                            <input type="text" placeholder="Masukkan judul halaman" class="form-control" id="judul_halaman" name="judul_halaman" value="{{ isset($data) ? $data->judul_halaman : old('judul_halaman') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="visi"><b>Visi:</b></label>
                            <div class="bg-white p-2">
                                <div id="editor-visi" style="height: 300px;">{!! isset($data) ? $data->visi : old('visi') !!}</div>
                            </div>
                            <textarea class="form-control" id="visi" name="visi" style="display:none;"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="misi"><b>Misi:</b></label>
                            <div class="bg-white p-2">
                                <div id="editor-misi" style="height: 300px;">{!! isset($data) ? $data->misi : old('misi') !!}</div>
                            </div>
                            <textarea class="form-control" id="misi" name="misi" style="display:none;"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="tujuan"><b>Tujuan:</b></label>
                            <div class="bg-white p-2">
                                <div id="editor-tujuan" style="height: 300px;">{!! isset($data) ? $data->tujuan : old('tujuan') !!}</div>
                            </div>
                            <textarea class="form-control" id="tujuan" name="tujuan" style="display:none;"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('visi_misi.index') }}" class="btn btn-secondary">Kembali</a>
                    </form>
            </div>
        </div>
    </div>

    <!-- Include Quill library -->
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script>
        // Inisialisasi Quill untuk bagian Visi
        var quillVisi = new Quill('#editor-visi', {
            theme: 'snow',
            placeholder: 'Tulis visi disini...',
        });
    
        // Inisialisasi Quill untuk bagian Misi
        var quillMisi = new Quill('#editor-misi', {
            theme: 'snow',
            placeholder: 'Tulis misi disini...',
        });
    
        // Inisialisasi Quill untuk bagian Tujuan
        var quillTujuan = new Quill('#editor-tujuan', {
            theme: 'snow',
            placeholder: 'Tulis tujuan disini...',
        });
    
        // Fungsi callback yang dipanggil saat kontennya berubah
        function handleContentChange() {
            // Set nilai input tersembunyi sesuai dengan konten Quill
            document.querySelector('#visi').value = quillVisi.root.innerHTML;
            document.querySelector('#misi').value = quillMisi.root.innerHTML;
            document.querySelector('#tujuan').value = quillTujuan.root.innerHTML;
        }
    
        // Inisialisasi MutationObservers
        var observerVisi = new MutationObserver(handleContentChange);
        var observerMisi = new MutationObserver(handleContentChange);
        var observerTujuan = new MutationObserver(handleContentChange);
    
        // Amati editor Quill untuk perubahan konten
        observerVisi.observe(quillVisi.root, { childList: true, subtree: true });
        observerMisi.observe(quillMisi.root, { childList: true, subtree: true });
        observerTujuan.observe(quillTujuan.root, { childList: true, subtree: true });
    
        // Event listener saat formulir disubmit
        document.querySelector('form').onsubmit = function () {
            // Panggil fungsi untuk menangani perubahan konten
            handleContentChange();
        };
    </script>
    
@endsection
