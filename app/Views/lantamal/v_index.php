<div class="col-md-12" style="margin-top: 10px;">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <p class="card-title" style="font-size: 21px;"><strong><?= $judul ?></strong></p>

            <div class="card-tools">
                <a href="<?= base_url('Lantamal/Input') ?>" class="btn btn-flat btn-primary btn-sm">
                    <i class="fas fa-plus"></i> Tambah
                </a>
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <?php
            //notif
            if (session()->getFlashdata('success')) {
                echo '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i>';
                echo session()->getFlashdata('success');
                echo '</h5></div>';
            }

            ?>
            <table id="example2" class="table table-sm table-bordered table-striped">
                <thead>
                    <tr class="text-center">
                        <th class="align-middle">No</th>
                        <th class="align-middle" width="170px">Nama</th>
                        <th class="align-middle" width="80px">Tanggal Dibentuk</th>
                        <th class="align-middle" width="80px">Total Alutsista</th>
                        <th class="align-middle">Alamat</th>
                        <th class="align-middle">Foto</th>
                        <th class="align-middle" width="110px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($lantamal as $key => $value) { ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td class="text-center"><?= $value['nama_lantamal'] ?></td>
                            <td class="text-center"><?= date('d-m-Y', strtotime($value['tgl_dibentuk'])) ?></td>
                            <td class="text-center"><span><?= $value['total_alutsista'] ?></span></td>
                            <td class="text-justify"><?= $value['alamat'] ?></td>
                            <td class="text-center"><img src="<?= base_url('Gambar/Lantamal/Logo/' . $value['foto']) ?>" width="120px" height="120px"></td>
                            <td class="text-center">
                                <a href="<?= base_url('Lantamal/Detail/' . $value['id']) ?>" class="btn btn-sm btn-success"><i class="fas fa-eye"></i></a>
                                <a href="<?= base_url('Lantamal/Edit/' . $value['id']) ?>" class="btn btn-sm btn-warning"><i class="fas fa-pencil-alt"></i></a>
                                <a href="<?= base_url('Lantamal/Delete/' . $value['id']) ?>" onclick="return confirm('Ingin Hapus Data <?= $value['nama_lantamal'] ?>?')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
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
        $('#example2').DataTable({
            "responsive": true,
            "columnDefs": [{
                    "orderable": false,
                    "targets": [5, 6]
                } // Nonaktifkan sorting untuk kolom Foto dan Aksi
            ],
            "language": {
                "lengthMenu": "Tampilkan _MENU_ Baris",
                "zeroRecords": "Tidak Ada Data Yang Ditemukan",
                "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                "infoEmpty": "Tidak Ada Data Yang Tersedia",
                "infoFiltered": "(disaring dari total _MAX_ entri)",
                "search": "Pencarian:",
                "paginate": {
                    "first": "Pertama",
                    "last": "Terakhir",
                    "next": "<i class='fas fa-angle-right'></i>",
                    "previous": "<i class='fas fa-angle-left'></i>"
                }
            }
        });
    });
</script>