<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>GIS Alutsista TNI | Log in</title>

  <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="<?= base_url('/') ?>" class="h1"><b>GIS</b> ALUTSISTA TNI</a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Login Terlebih Dahulu</p>
        <?php
        session();
        $validation = \Config\Services::validation();

        //notif insert data
        if (session()->getFlashdata('pesan')) {
          echo '<div class="alert alert-danger">';
          echo session()->getFlashdata('pesan');
          echo '</div>';
        }

        if (session()->getFlashdata('logout')) {
          echo '<div class="alert alert-success">';
          echo session()->getFlashdata('logout');
          echo '</div>';
        }
        ?>

        <?php echo form_open('Auth/CekLogin') ?>
        <?php $errors = session()->getFlashdata('errors'); ?>
        <!-- Email -->
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div><br>
        </div>
        <p class="text-danger"><?= isset($errors['email']) ? $errors['email'] : '' ?></p>

        <!-- Password -->
        <div>jancuk</div>
        <p class="text-danger"><?= $validation->hasError('email') ? $validation->getError('email') : '' ?></p>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div><br>
        </div>
        <p class="text-danger"><?= isset($errors['password']) ? $errors['password'] : '' ?></p>

        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Login</button>
          </div>
          <!-- /.col -->
        </div>
        <?php echo form_close() ?>


        <!-- /.social-auth-links -->


      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="<?= base_url('AdminLTE') ?>/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url('AdminLTE') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url('AdminLTE') ?>/dist/js/adminlte.min.js"></script>
</body>

</html>