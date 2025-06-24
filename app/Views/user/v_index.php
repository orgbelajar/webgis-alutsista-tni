<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="<?= base_url('css/alert.css') ?>">
</head>

<body>
  <?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success">
      <span class="fas fa-exclamation-circle"></span>
      <span class="msg"><?= session()->getFlashdata('success') ?></span>
      <div class="close-btn">
        <span class="fas fa-times"></span>
      </div>
    </div>
  <?php endif; ?>

  <?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-error">
      <span class="fas fa-exclamation-circle"></span>
      <span class="msg"><?= session()->getFlashdata('error') ?></span>
      <div class="close-btn">
        <span class="fas fa-times"></span>
      </div>
    </div>
  <?php endif; ?>

  <div class="col-md-12" style="margin-top: 10px;">
    <div class="card card-outline card-primary">
      <div class="card-header">
        <p class="card-title" style="font-size: 21px;"><strong>Daftar <?= $judul ?></strong></p>


        <div class="card-tools">
          <a href="<?= base_url('User/Add') ?>" class="btn btn-flat btn-primary btn-sm">
            <i class="fas fa-plus"></i> Tambah
          </a>
        </div>
        <!-- /.card-tools -->
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <!-- Alert Notifications -->
        <table id="example2" class="table table-sm table-bordered table-striped">
          <thead>
            <tr class="text-center">
              <th class="align-middle" width="45px">No</th>
              <th class="align-middle">Nama User</th>
              <th class="align-middle">Email</th>
              <th class="align-middle">Foto</th>
              <th class="align-middle" width="100px">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1;
            foreach ($user as $key => $value) { ?>
              <tr>
                <td class="text-center"><?= $no++ ?></td>
                <td class="text-center"><?= $value['nama_user'] ?></td>
                <td class="text-center"><?= $value['email'] ?></td>
                <td class="text-center"><img src="<?= base_url('foto_user/' . $value['foto']) ?>" width="120px" height="120px"></td>
                <td class="text-center">
                  <a href="<?= base_url('User/Edit/' . $value['id_user']) ?>" class="btn btn-sm btn-warning"><i class="fas fa-pencil-alt"></i></a>
                  <a href="<?= base_url('User/Delete/' . $value['id_user']) ?>" onclick="return confirm('Ingin Hapus User <?= $value['nama_user'] ?>?')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
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
                    "targets": [3, 4]
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

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
      // Show all alerts on page load
      $('.alert').each(function() {
        $(this).addClass("show showAlert");
        setTimeout(function() {
          $(this).removeClass("show");
          $(this).addClass("hide");
        }.bind(this), 3000);
      });

      // Close button functionality
      $('.close-btn').click(function() {
        let alertBox = $(this).closest('.alert');
        alertBox.removeClass("show");
        alertBox.addClass("hide");
      });
    });
  </script>
</body>

</html>