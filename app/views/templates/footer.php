<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="<?= BASEURL; ?>/js/bootstrap.js"></script>
<script>
    $(function() {
        $('.tombolTambahData').on('click', function() {
            $('#formModalLabel').html('Tambah Data Mahasiswa');
            $('.modal-footer button[type=submit]').html('Tambah Data');
            $('#nama').val('');
            $('#nrp').val('');
            $('#email').val('');
            $('#jurusan').val('');
            $('#id').val('');
        });


        $('.tampilModalUbah').on('click', function() {
            $('#formModalLabel').html('Ubah Data Mahasiswa');
            $('.modal-footer button[type=submit]').html('Ubah Data');
            $('.modal-body form').attr('action', '<?= BASEURL; ?>/mahasiswa/ubah');

            const id = $(this).data('id');

            $.ajax({
                url: '<?= BASEURL; ?>/mahasiswa/getubah',
                data: {
                    id: id
                },
                method: 'post',
                dataType: 'json',
                success: function(data) {
                    $('#nama').val(data.nama);
                    $('#nrp').val(data.nrp);
                    $('#email').val(data.email);
                    $('#jurusan').val(data.jurusan);
                    $('#id').val(data.id);
                }
            });

        });

        $('#tambahDataMatkul').on('click', function() {
            $('#formModalLabel').html('Tambah Data Mahasiswa');
            $('.modal-footer button[type=submit]').html('Tambah Data Mata Kuliah');

            $('.modal-body form').attr('action', '<?= BASEURL; ?>/mahasiswa');

            $('#nama').val('')
            $('#deskripsi').val('')
        })

        $('.tombolUbahMatkul').on('click', function() {
            $('#formModalLabel').html('Ubah Data Mahasiswa');
            $('.modal-footer button[type=submit]').html('Ubah Data');

            $('.modal-content form').attr('action', '<?= BASEURL; ?>/matakuliah/update');

            const id = $(this).data('id');


            $.ajax({
                url: '<?= BASEURL; ?>/matakuliah/detailjson',
                data: {
                    id: id
                },
                method: 'post',
                dataType: 'json',
                success: function(data) {
                    $('#nama').val(data.nama);
                    $('#deskripsi').val(data.deskripsi);
                    $('#id').val(data.id);
                }
            });
        })

        $('#tambahMatkulMhs').on('click', function() {
            $('#modal-title').html('Tambah Mata Kuliah Mahasiswa')
            $('.modal-footer button[type=submit]').html('Tambah');
            $('.modal-content form').attr('action', '<?= BASEURL; ?>/mata_kuliah_mahasiswa');


        })

        $('#hapusMatkulMhs').on('click', function() {
            $('#modal-title').html('Hapus Mata Kuliah Mahasiswa')
            $('.modal-footer button[type=submit]').html('Hapus');
            $('.modal-content form').attr('action', '<?= BASEURL; ?>/mata_kuliah_mahasiswa/delete');


        })
    });
</script>
</body>

</html>