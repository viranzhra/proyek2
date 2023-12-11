<!-- ... (bagian sebelumnya) ... -->

<!-- Modal Tambah Data -->
<div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahModalLabel">Tambah Data Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form tambah data siswa -->
                <form action="" method="post">
                    @csrf
                    <!-- ... (tambahkan input fields sesuai kebutuhan) ... -->
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit Data -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Data Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form edit data siswa -->
                <form action="" method="post">
                    @csrf
                    @method('PUT')
                    <!-- ... (tambahkan input fields sesuai kebutuhan) ... -->
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- ... (bagian sebelumnya) ... -->

<!-- ... (bagian setelahnya) ... -->

<!-- Tombol Tambah Data -->
<a href="#" class="btn btn-primary" title="Tambah Data" data-toggle="modal" data-target="#tambahModal">
    <i class="fas fa-plus"></i> Tambah Data
</a>

<!-- ... (bagian setelahnya) ... -->

<!-- Tombol Edit Data -->
<a href="#" class="btn btn-success btn-sm" title="Edit" data-toggle="modal" data-target="#editModal">
    <i class="fas fa-edit"></i>
</a>
