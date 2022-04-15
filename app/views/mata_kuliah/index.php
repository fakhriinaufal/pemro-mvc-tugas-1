<div class="container mt-3">

    <!-- Flash -->
    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash(); ?>
        </div>
    </div>
    <!-- End Flash -->

    <div class="row mb-3">
        <div class="col-lg-6">
            <button type="button" class="btn btn-primary" id="tambahDataMatkul" data-toggle="modal" data-target="#tambahMatkulModal">
                Tambah Data Mata Kuliah
            </button>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <h3>Daftar Mata Kuliah</h3>
            <ul class="list-group">
                <?php foreach ($data['matkul'] as $matkul) : ?>
                    <li class="list-group-item">
                        <?= $matkul['nama']; ?>
                        <a href="<?= BASEURL; ?>/matakuliah/hapus/<?= $matkul['id']; ?>" class="badge badge-danger float-right" onclick="return confirm('Yakin?');">Hapus</a>
                        <a href="<?= BASEURL; ?>/matakuliah/ubah/<?= $matkul['id']; ?>" class="badge badge-success float-right tombolUbahMatkul" data-toggle="modal" data-target="#tambahMatkulModal" data-id="<?= $matkul['id']; ?>">Ubah</a>
                        <!-- <a href="<?= BASEURL; ?>/mahasiswa/detail/<?= $matkul['id']; ?>" class="badge badge-primary float-right">detail</a> -->
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal" id="tambahMatkulModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <form action="<?= BASEURL ?>/matakuliah" method="POST">
                    <div class="modal-body">
                        <input type="hidden" id="id" name="id">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Mata Kuliah</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="">
                        </div>

                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- End Modal -->
</div>