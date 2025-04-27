<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>GIS Alutsista TNI | <?= $judul ?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <!-- <link rel="stylesheet" href="<? //= base_url('AdminLTE') 
                                    ?>/plugins/fontawesome-free/css/all.min.css"> -->
  <!-- Font Awesome via CDN -->
  <script src="https://kit.fontawesome.com/9d76725032.js" crossorigin="anonymous"></script>
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/dist/css/adminlte.min.css">
  <!-- leaflet -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

</head>

<body class="hold-transition sidebar-collapse layout-top-nav">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
      <div class="container">
        <a href="<?= base_url('AdminLTE') ?>/index3.html" class="navbar-brand">
          <img src="<?= base_url() ?>/logo/pusinfolahta.png" class="me-2" height="50px" width="40px">
        </a>
        <h5><b><?= $web['nama_web'] ?></b></h5>
        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse order-3" id="navbarCollapse">
          <!-- Left navbar links -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url() ?>" class="nav-link">Home</a>
            </li>

            <li class="nav-item dropdown">
              <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Wilayah</a>
              <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                <?php foreach ($wilayah as $key => $value) { ?>
                  <li><a href="<?= base_url('Home/Wilayah/' . $value['id']) ?>" class="dropdown-item"><?= $value['nama_wilayah'] ?> </a></li>
                <?php } ?>

              </ul>
            </li>

            <li class="nav-item dropdown">
              <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Kesatuan</a>
              <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                <?php foreach ($kesatuan as $key => $value) { ?>
                  <?php
                  // Cek kalau kesatuan adalah TNI AL
                  if ($value['kesatuan'] == 'TNI AL') {
                    $url = base_url('HomeLantamal/Kesatuan/' . $value['id']);
                  } else {
                    $url = base_url('Home/Kesatuan/' . $value['id']);
                  }
                  ?>
                  <li><a href="<?= $url ?>" class="dropdown-item"><?= $value['kesatuan'] ?></a></li>
                <?php } ?>
              </ul>
            </li>
          </ul>


        </div>

        <!-- Right navbar links -->
        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">

          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('Auth/Login') ?>">
              <i class="fas fa-sign-in-alt"></i> Masuk Admin
            </a>
          </li>
        </ul>
      </div>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="<?= base_url() ?>" class="brand-link">
        <img src="<?= base_url() ?>/logo/Lambang_TNI.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">GIS Alutsista TNI</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user (optional) -->




        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="<?= base_url('Home') ?>" class="nav-link">
                <i class="nav-icon fas fa-home"></i>
                <p>
                  Home
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link">
                <!-- <i class="nav-icon fas fa-layer-group"></i> -->
                <i class="nav-icon fas fa-map-location-dot"></i>
                <p>
                  Wilayah
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <?php foreach ($wilayah as $key => $value) { ?>
                  <li class="nav-item">
                    <a href="<?= base_url('Home/Wilayah/' . $value['id']) ?>" class="nav-link">
                      <i class="fas fa-location-dot nav-icon"></i>
                      <p><?= $value['nama_wilayah'] ?> </p>
                    </a>
                  </li>
                <?php } ?>
              </ul>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link">
                <!-- <img src="<? //= base_url('gambar/komandan tni memberi arahan.png') 
                                ?>" alt="Setting Icon" class="nav-icon" style="width: 20px; height: 20px;"> -->
                <i class="nav-icon fas fa-person-military-rifle"></i>
                <p>
                  Satuan
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <?php foreach ($kesatuan as $key => $value) { ?>
                  <?php
                  $icon = '';
                  $satuan = '';
                  if (stripos($value['kesatuan'], 'TNI AD') !== false) {
                    $icon = base_url('Gambar/Logo_TNI_AD_1.png');
                    $satuan = 'Kodam';
                  } elseif (stripos($value['kesatuan'], 'TNI AL') !== false) {
                    $icon = base_url('Gambar/Lambang_TNI_AL_2.png');
                    $satuan = 'Lantamal';
                  } elseif (stripos($value['kesatuan'], 'TNI AU') !== false) {
                    $icon = base_url('Gambar/Lambang_TNI_AU_1.png');
                    $satuan = 'Koopsud';
                  } else {
                    $icon = base_url('Gambar/Logo_TNI_AD_1.png');
                  }
                  ?>
                  <li class="nav-item">
                    <a href="<?= base_url('Home/Kesatuan/' . $value['id']) ?>" class="nav-link">
                      <img src="<?= $icon ?>" alt="Icon <?= $value['kesatuan'] ?>" class="nav-icon" style="width: 20px; height: 20px;">
                      <p><?= $satuan . ' (' . $value['kesatuan'] . ')' ?></p>
                    </a>
                  </li>
                <?php } ?>
              </ul>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->

      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">

        <div class="row">
          <!-- /.isi konten -->
          <?php
          if ($page) {
            echo view($page);
          }
          ?>
          <!-- /end isi konten -->

          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->

      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->



    <!-- Main Footer -->
    <footer class="main-footer">
      <!-- To the right -->
      <div class="float-right d-none d-sm-inline">
        <!-- Anything you want -->
      </div>
      <!-- Default to the left -->
      <strong>Copyright &copy; <?= date('Y') ?> <a href="<?= base_url() ?>"><?= $web['nama_web'] ?></a>.</strong> All rights reserved.
    </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src="<?= base_url('AdminLTE') ?>/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url('AdminLTE') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url('AdminLTE') ?>/dist/js/adminlte.min.js"></script>

</body>

</html>