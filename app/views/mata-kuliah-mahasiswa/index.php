<div class="container mt-3">
    <h1>Daftar Mata Kuliah Mahasiswa</h1>
    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash(); ?>
        </div>
    </div>
    <button class="btn btn-primary" id="tambahMatkulMhs" data-toggle="modal" data-target="#modalMatkulMhs">Tambah Mata Kuliah Mahasiswa</button>
    <button class="btn btn-danger" id="hapusMatkulMhs" data-toggle="modal" data-target="#modalMatkulMhs">Hapus Mata Kuliah Mahasiswa</button>
    <table class="table table-hover mt-2">
        <thead>
            <tr>
                <th>Nama Mahasiswa</th>
                <th>Mata Kuliah</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['mhs'] as $mhs) : ?>
                <tr>
                    <td><?= $mhs['nama']; ?></td>
                    <td>
                        <ul>
                            <?php foreach (explode(",", $mhs['mata_kuliah']) as $matkul) : ?>
                                <li><?= $matkul ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Modal -->
<div class="modal" id="modalMatkulMhs" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-title">Tambah Mata Kuliah Mahasiswa</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <form action="<?= BASEURL ?>/mata_kuliah_mahasiswa" method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="id_mahasiswa">Mahasiswa</label>
                        <select class="form-control" id="id_mahasiswa" name="id_mahasiswa">
                            <?php foreach ($data['mahasiswa'] as $mhs) : ?>
                                <option value="<?= $mhs['id'] ?>"><?= $mhs['nama'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="id_mata_kuliah">Mata Kuliah</label>
                        <select class="form-control" id="id_mata_kuliah" name="id_mata_kuliah">
                            <?php foreach ($data['mata_kuliah'] as $mataKuliah) : ?>
                                <option value="<?= $mataKuliah['id'] ?>"><?= $mataKuliah['nama'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah Data</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- End Modal -->