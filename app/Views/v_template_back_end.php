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
  <!-- Font Awesome Icons
  <link rel="stylesheet" href="<? //= base_url('AdminLTE') 
                                ?>/plugins/fontawesome-free/css/all.min.css"> -->
  <!-- Font Awesome via CDN -->
  <script src="https://kit.fontawesome.com/9d76725032.js" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="/public/AdminLTE/styles.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/dist/css/adminlte.min.css">

  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

  <!-- jQuery -->
  <script src="<?= base_url('AdminLTE') ?>/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url('AdminLTE') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Select2 -->
  <script src="<?= base_url('AdminLTE') ?>/plugins/select2/js/select2.full.min.js"></script>
  <!-- bootstrap color picker -->
  <script src="<?= base_url('AdminLTE') ?>/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
  <!-- DataTables  & Plugins -->
  <script src="<?= base_url('AdminLTE') ?>/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url('AdminLTE') ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?= base_url('AdminLTE') ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="<?= base_url('AdminLTE') ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="<?= base_url('AdminLTE') ?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="<?= base_url('AdminLTE') ?>/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="<?= base_url('AdminLTE') ?>/plugins/jszip/jszip.min.js"></script>
  <script src="<?= base_url('AdminLTE') ?>/plugins/pdfmake/pdfmake.min.js"></script>
  <script src="<?= base_url('AdminLTE') ?>/plugins/pdfmake/vfs_fonts.js"></script>
  <script src="<?= base_url('AdminLTE') ?>/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="<?= base_url('AdminLTE') ?>/plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="<?= base_url('AdminLTE') ?>/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url('AdminLTE') ?>/dist/js/adminlte.min.js"></script>

</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <!-- <li class="nav-item d-none d-sm-inline-block">
          <a href="index3.html" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Contact</a>
        </li> -->
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">





        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('Auth/LogOutAdmin') ?>">
            <i class="fas fa-sign-out-alt"></i> Keluar
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="<?= base_url('Admin') ?>" class="brand-link">
        <img src="/logo/webgis.png" alt="AdminLTE Logo" class="me-2" height="58px" width="58px">
        <span class="brand-text font-weight-light">WEB GIS Alutsista TNI</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="<?= base_url('foto') ?>/<?= session()->get('foto') ?>" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block"><?= session()->get('nama_user') ?></a>
          </div>
        </div> -->

        <!-- SidebarSearch Form -->
        <div class="form-inline" style="margin-top: 8px;">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="<?= base_url('Admin') ?>" class="nav-link <?= $menu  ==  'dashboard' ? 'active' : '' ?>">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>

           
            <li class="nav-item">
              <a href="<?= base_url('PreHome') ?>" class="nav-link <?= $menu  ==  'prehome' ? 'active' : '' ?>">
                <i class="nav-icon fas fa-home"></i>
                <p>
                  Home
                </p>
              </a>
            </li>

            

            <!-- Sebelumnya Poligon Wilayah -->
            <!-- <li class="nav-item">
              <a href="<? //= base_url('Wilayah') 
                        ?>" class="nav-link <? //= $menu  ==  'wilayah' ? 'active' : '' 
                                                                      ?>">
                <i class="nav-icon fas fa-layer-group"></i>
                <p>
                  Wilayah
                </p>
              </a>
            </li> -->

            <li class="nav-item">
              <a href="<?= base_url('Kesatuan') ?>" class="nav-link <?= $menu  ==  'kesatuan' ? 'active' : '' ?>">
                <i class="nav-icon fas fa-person-military-rifle"></i>
                <p>
                  Kesatuan
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?= base_url('Kodam') ?>" class="nav-link <?= $menu  ==  'kodam' ? 'active' : '' ?>">
                <img src="<?= base_url('Gambar/Logo_TNI_AD_1.png') ?>" alt="Setting Icon" class="nav-icon" style="width: 25px; height: 25px;">
                <p>Kodam</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?= base_url('Lantamal') ?>" class="nav-link <?= $menu  ==  'lantamal' ? 'active' : '' ?>">
                <img src="<?= base_url('Gambar/Lambang_TNI_AL_2.png') ?>" alt="Setting Icon" class="nav-icon" style="width: 25px; height: 25px;">
                <p>Lantamal</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?= base_url('Koopsud') ?>" class="nav-link <?= $menu  ==  'koopsud' ? 'active' : '' ?>">
                <img src="<?= base_url('Gambar/Lambang_TNI_AU_1.png') ?>" alt="Setting Icon" class="nav-icon" style="width: 25px; height: 25px;">
                <p>Koopsud</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?= base_url('User') ?>" class="nav-link <?= $menu  ==  'user' ? 'active' : '' ?>">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  User
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?= base_url('Admin/Setting') ?>" class="nav-link <?= $menu  ==  'setting' ? 'active' : '' ?>">
                <i class="nav-icon fas fa-cogs"></i>
                <p>
                  Setting
                </p>
              </a>
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
      <!-- <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0"><?= $judul ?></h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?//= base_url('Admin') ?>">Home</a></li>
              </ol>
            </div>
          </div>
        </div>
      </div> -->
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content" style="margin-top: 0px;">
        <div class="container-fluid">
          <div class="row">
            <!-- /.isi konten -->
            <?php
            if ($page) {
              echo view($page);
            }
            ?>
            <!-- /end isi konten -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->



    <!-- Main Footer -->
    <footer class="main-footer">
      <!-- To the right -->
      <div class="float-right d-none d-sm-inline">
        Anything you want
      </div>
      <!-- Default to the left -->
      <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
    </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

</body>

</html>