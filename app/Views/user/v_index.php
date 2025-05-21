<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    /* Alert Notification Styles */
    .alert {
      padding: 20px 40px;
      min-width: 420px;
      position: fixed;
      right: 0;
      top: 20px;
      border-radius: 4px;
      overflow: hidden;
      opacity: 0;
      pointer-events: none;
      z-index: 9999;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .alert.showAlert {
      opacity: 1;
      pointer-events: auto;
    }

    .alert.show {
      animation: show_slide 1s ease forwards;
    }

    .alert.hide {
      animation: hide_slide 1s ease forwards;
    }

    /* Animasi alert */
    @keyframes show_slide {
      0% {
        transform: translateX(100%);
      }

      40% {
        transform: translateX(-10%);
      }

      80% {
        transform: translateX(0%);
      }

      100% {
        transform: translateX(-10px);
      }
    }

    @keyframes hide_slide {
      0% {
        transform: translateX(-10px);
      }

      40% {
        transform: translateX(0%);
      }

      80% {
        transform: translateX(-10%);
      }

      100% {
        transform: translateX(100%);
      }
    }

    /* ICON & CLOSE BUTTON */
    .alert .fa-exclamation-circle {
      position: absolute;
      left: 20px;
      top: 50%;
      transform: translateY(-50%);
      font-size: 30px;
    }

    .alert .msg {
      padding: 0 20px;
      font-size: 18px;
    }

    .alert .close-btn {
      position: absolute;
      right: 0px;
      top: 50%;
      transform: translateY(-50%);
      padding: 20px 18px;
      cursor: pointer;
    }

    .alert .close-btn .fas {
      font-size: 22px;
      line-height: 40px;
    }

    /* SUCCESS (pesan & logout) */
    .alert-success {
      background: #d4edda;
      border-left: 8px solid #28a745;
    }

    .alert-success .fa-exclamation-circle,
    .alert-success .msg,
    .alert-success .close-btn .fas {
      color: #155724;
    }

    .alert-success .close-btn {
      background: #c3e6cb;
    }

    .alert-success .close-btn:hover {
      background: #b1dfbb;
    }

    /* ERROR (kesalahan login) */
    .alert-error {
      background: #f8d7da;
      border-left: 8px solid #dc3545;
    }

    .alert-error .fa-exclamation-circle,
    .alert-error .msg,
    .alert-error .close-btn .fas {
      color: #721c24;
    }

    .alert-error .close-btn {
      background: #f5c6cb;
    }

    .alert-error .close-btn:hover {
      background: #f1b0b7;
    }
  </style>
</head>

<body>
  <?php if (session()->getFlashdata('pesan')): ?>
    <div class="alert alert-success">
      <span class="fas fa-exclamation-circle"></span>
      <span class="msg"><?= session()->getFlashdata('pesan') ?></span>
      <div class="close-btn">
        <span class="fas fa-times"></span>
      </div>
    </div>
  <?php endif; ?>

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
        <p class="card-title" style="font-size: 21px;"><strong><?= $judul ?></strong></p>


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
              <th width="50px">No</th>
              <th>Nama User</th>
              <th>E-mail</th>
              <th>Foto</th>
              <th width="150px">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1;
            foreach ($user as $key => $value) { ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= $value['nama_user'] ?></td>
                <td class="text-center"><?= $value['email'] ?></td>
                <td class="text-center"><img src="<?= base_url('foto_user/' . $value['foto']) ?>" width="100px" height="100px"></td>
                <td class="text-center">
                  <a href="<?= base_url('User/Edit/' . $value['id_user']) ?>" class="btn btn-xs btn-warning btn-flat"><i class="fas fa-pencil-alt"></i></a>
                  <a href="<?= base_url('User/Delete/' . $value['id_user']) ?>" onclick="return confirm('Ingin Hapus Data..?')" class="btn btn-xs btn-danger btn-flat"><i class="fas fa-trash"></i></a>
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
      $('#example2').DataTable({
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

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
      // Show all alerts on page load
      $('.alert').each(function() {
        $(this).addClass("show showAlert");
        setTimeout(function() {
          $(this).removeClass("show");
          $(this).addClass("hide");
        }.bind(this), 5000);
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