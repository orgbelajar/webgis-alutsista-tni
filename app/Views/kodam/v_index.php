<div class="col-md-12" style="margin-top: 10px;">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <p class="card-title"  style="font-size: 21px;"><strong>Daftar <?= $judul ?></strong></p>
            <div class="card-tools">
                <a href="<?= base_url('Kodam/Input') ?>" class="btn btn-flat btn-primary btn-sm">
                    <i class="fas fa-plus"></i> Tambah
                </a>
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <?php
            //notif insert data
            if (session()->getFlashdata('insert')) {
                echo '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i>';
                echo session()->getFlashdata('insert');
                echo '</h5></div>';
            }

            //notif update data
            if (session()->getFlashdata('update')) {
                echo '<div class="alert alert-primary alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i>';
                echo session()->getFlashdata('update');
                echo '</h5></div>';
            }

            //notif update data
            if (session()->getFlashdata('delete')) {
                echo '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i>';
                echo session()->getFlashdata('delete');
                echo '</h5></div>';
            }

            ?>
            <table id="example2" class="table table-sm table-bordered table-striped">
                <thead>
                    <tr class="text-center">
                        <th width="50px">No</th>
                        <th>Nama Kodam</th>
                        <th>Tanggal Dibentuk</th>
                        <th>Kesatuan</th>
                        <th>Alamat</th>
                        <th>Foto</th>
                        <th width="150px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($kodam as $key => $value) { ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td><?= $value['nama_kodam'] ?></td>
                            <td class="text-center"><?= $value['tgl_dibentuk'] ?></td>
                            <td class="text-center"><?= $value['kesatuan'] ?></td>
                            <td><?= $value['alamat'] ?></td>
                            <td class="text-center"><img src="<?= base_url('Gambar/Kodam/Logo/' . $value['foto']) ?>" width="110px" height="110px"></td>
                            <td class="text-center">
                                <a href="<?= base_url('Kodam/Detail/' . $value['id']) ?>" class="btn btn-xs btn-success btn-flat"><i class="fas fa-eye"></i></a>
                                <a href="<?= base_url('Kodam/Edit/' . $value['id']) ?>" class="btn btn-xs btn-warning btn-flat"><i class="fas fa-pencil-alt"></i></a>
                                <a href="<?= base_url('Kodam/Delete/' . $value['id']) ?>" onclick="return confirm('Ingin Hapus Data <?= $value['nama_kodam'] ?>?')" class="btn btn-xs btn-danger btn-flat"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>

<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $("#example2").DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>