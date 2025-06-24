<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Ensiklopedia Alutsista TNI - <?= $judul ?></title>
  <link rel="icon" type="image/png" sizes="48x48" href="/logo/webgis.png">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <!-- <link rel="stylesheet" href="<? //= base_url('AdminLTE') 
                                    ?>/plugins/fontawesome-free/css/all.min.css"> -->
  <!-- Font Awesome via CDN -->
  <script src="https://kit.fontawesome.com/9d76725032.js" crossorigin="anonymous"></script>
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="/public/css/styles.css">
  <!-- leaflet -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

</head>

<body class="hold-transition sidebar-collapse layout-top-nav">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
      <div class="container">

        <a href="<?= base_url('Home') ?>" class="">
          <img src="<?= base_url('logo/webgis.png') ?>" class="me-2" height="70px" width="70px" >
        </a>
        <!-- <h5><b><? //= $web['nama_web'] 
                    ?></b></h5> -->
        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse order-3" id="navbarCollapse">
          <!-- Left navbar links -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                <h5><i class="fas fa-bars"></i></h5>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('Home') ?>" class="nav-link">
                <h5><strong>Home</strong></h5>
              </a>
            </li>

            <li class="nav-item dropdown">
              <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">
                <h5><strong>Wilayah</strong></h5>
              </a>
              <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow dropdown-menu-scrollable">
                <?php foreach ($wilayah as $key => $value) { ?>
                  <li><a href="<?= base_url('Home/Wilayah/' . $value['id']) ?>" class="dropdown-item"><?= $value['nama_wilayah'] ?> </a></li>
                <?php } ?>

              </ul>
            </li>

            <li class="nav-item dropdown">
              <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">
                <h5><strong>Kesatuan</strong></h5>
              </a>
              <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                <?php foreach ($kesatuan as $key => $value) { ?>
                  <?php
                  // Cek kalau kesatuan adalah TNI AL
                  if ($value['kesatuan'] == 'TNI AL') {
                    $url = base_url('HomeLantamal/Kesatuan/' . $value['id']);
                  } elseif ($value['kesatuan'] == 'TNI AU') {
                    $url = base_url('HomeKoopsud/Kesatuan/' . $value['id']);
                  } elseif ($value['kesatuan'] == 'TNI AD') {
                    $url = base_url('HomeKodam/Kesatuan/' . $value['id']);
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
            <a class="nav-link" href="<?= base_url('Auth/LogOutUser') ?>">
              <h5><strong><i class="fas fa-sign-in-alt"></i> Keluar</strong></h5>
            </a>
          </li>
        </ul>
      </div>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="<?= base_url('Home') ?>" class="brand-link d-flex justify-content-center">
        <img src="/logo/webgis.png" alt="AdminLTE Logo" height="150px" width="150px">
        <!-- <span class="brand-text font-weight-light"></span> -->
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-0 d-flex">
          <div class="image">
            <img src="<?= base_url('foto_user/') ?><?= session()->get('foto') ?>" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <span class="d-block" style="color: azure;"><?= session()->get('nama_user') ?></span>
          </div>
        </div>


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
              <ul class="nav nav-treeview sidebar-scrollable">
                <?php foreach ($wilayah as $key => $value) { ?>
                  <li class="nav-item">
                    <a href="<?= base_url('Home/Wilayah/' . $value['id']) ?>" class="nav-link">
                      <i class="fas fa-location-dot nav-icon"></i>
                      <p class="region-name"> <?= $value['nama_wilayah'] ?> </p>
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
                  Kesatuan
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <?php foreach ($kesatuan as $key => $value) { ?>
                  <?php
                  $icon = '';
                  $satuan = '';
                  $url = '';

                  // Tentukan ikon dan satuan
                  if (stripos($value['kesatuan'], 'TNI AD') !== false) {
                    $icon = base_url('Gambar/Logo_TNI_AD_1.png');
                    $satuan = 'Kodam';
                    $url = base_url('HomeKodam/Kesatuan/' . $value['id']);
                  } elseif (stripos($value['kesatuan'], 'TNI AL') !== false) {
                    $icon = base_url('Gambar/Lambang_TNI_AL_2.png');
                    $satuan = 'Lantamal';
                    $url = base_url('HomeLantamal/Kesatuan/' . $value['id']);
                  } elseif (stripos($value['kesatuan'], 'TNI AU') !== false) {
                    $icon = base_url('Gambar/Lambang_TNI_AU_1.png');
                    $satuan = 'Koopsud';
                    $url = base_url('HomeKoopsud/Kesatuan/' . $value['id']);
                  } else {
                    $icon = base_url('Gambar/Logo_TNI_AD_1.png');
                    $satuan = '';
                    $url = base_url('');
                  }
                  ?>
                  <li class="nav-item">
                    <a href="<?= $url ?>" class="nav-link d-flex align-items-center">
                      <img src="<?= $icon ?>" alt="Icon <?= $value['kesatuan'] ?>" class="nav-icon" style="width: 35px; height: 35px;">
                      <p class="mb-0 ms-2"><?= $satuan . ' (' . $value['kesatuan'] . ')' ?></p>
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
      <!-- <div class="float-right d-none d-sm-inline"> -->
      <!-- Anything you want -->
      <!-- </div> -->
      <!-- Default to the left -->
      <strong>Copyright &copy; <?= date('Y') ?> <a href="<?= base_url() ?>">WEB GIS ALUTSISTA TNI</a>
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

<script type="module">
  import Chatbot from "https://cdn.jsdelivr.net/npm/flowise-embed/dist/web.js"
  Chatbot.init({
    chatflowid: "05705ae6-e238-4d02-afba-1473b12482a9",
    apiHost: "http://localhost:3000",
    chatflowConfig: {
      /* Chatflow Config */
    },
    observersConfig: {
      /* Observers Config */
    },
    theme: {
      button: {
        backgroundColor: '#2268a7',
        right: 20,
        bottom: 20,
        size: 48,
        dragAndDrop: false,
        iconColor: 'white',
        customIconSrc: 'https://seeklogo.com/images/C/chatcoin-chat-logo-D655A30A39-seeklogo.com.png',
        autoWindowOpen: {
          autoOpen: false,
          openDelay: 2,
          autoOpenOnMobile: false
        }
      },
      tooltip: {
        showTooltip: false,
        tooltipMessage: '',
        tooltipBackgroundColor: 'white',
        tooltipTextColor: 'white',
        tooltipFontSize: 16
      },
      disclaimer: {
        title: 'Disclaimer',
        message: "By using this chatbot, you agree to the <a target=\"_blank\" href=\"https://flowiseai.com/terms\">Terms & Condition</a>",
        textColor: 'black',
        buttonColor: '#ef0724',
        buttonText: 'Start Chatting',
        buttonTextColor: 'white',
        blurredBackgroundColor: 'rgba(0, 0, 0, 0.4)',
        backgroundColor: 'white'
      },
      customCSS: ``,
      chatWindow: {
        showTitle: true,
        showAgentMessages: true,
        title: 'Ensiklopedia Alutsista TNI',
        titleAvatarSrc: 'https://upload.wikimedia.org/wikipedia/commons/0/0b/Flag_of_Indonesia.png',
        welcomeMessage: 'Halo, Selamat datang di Ensiklopedia Alutsista TNI! Adakah pertanyaan mengenai Alutsista TNI?',
        errorMessage: 'Maaf, sistem sedang bermasalah, Mohon tunggu sebentar.',
        backgroundColor: '',
        backgroundImage: 'https://i.pinimg.com/736x/7a/2f/5c/7a2f5c4ebcf3980af69c0041f5c152f9.jpg',
        height: 650,
        width: 400,
        fontSize: 16,
        starterPrompts: [
          "Ensiklopedia Alutsista TNI itu apa?",
          "Bagaimana sejarah Tentara Nasional Indonesia?",
          "Dimana Alamat Lantamal 3? "

        ],
        starterPromptFontSize: 15,
        clearChatOnReload: false,
        sourceDocsTitle: 'Sources:',
        renderHTML: true,
        botMessage: {
          backgroundColor: '#ececec',
          textColor: '#303235',
          showAvatar: true,
          avatarSrc: 'https://img.freepik.com/free-vector/chatbot-chat-message-vectorart_78370-4104.jpg'
        },
        userMessage: {
          backgroundColor: '#c8f2ff',
          textColor: '#000000',
          showAvatar: true,
          avatarSrc: 'https://thumb.ac-illust.com/51/51e1c1fc6f50743937e62fca9b942694_t.jpeg'
        },
        textInput: {
          placeholder: 'Tulis pertanyaan anda',
          backgroundColor: '#ecececf',
          textColor: '#303235',
          sendButtonColor: '#3B81F6',
          maxChars: 1000,
          maxCharsWarningMessage: 'You exceeded the characters limit. Please input less than 1000 characters.',
          autoFocus: true,
          sendMessageSound: true,
          sendSoundLocation: 'send_message.mp3',
          receiveMessageSound: true,
          receiveSoundLocation: 'receive_message.mp3'
        },
        feedback: {
          color: '#ef0724'
        },
        dateTimeToggle: {
          date: true,
          time: true
        },
        footer: {
          textColor: '#303235',
          text: 'Dikembangkan oleh Mahasiswa PKL Pusinfolahta',
          company: '',

        }
      }
    }
  })
</script>
</body>

</html>