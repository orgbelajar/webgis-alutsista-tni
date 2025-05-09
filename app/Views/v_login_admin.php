<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - WebGIS Alutsista TNI</title>
  <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/styles.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
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
  <!-- Alert Notifications -->
  <?php if (session()->getFlashdata('pesan')): ?>
    <div class="alert alert-success">
      <span class="fas fa-exclamation-circle"></span>
      <span class="msg"><?= session()->getFlashdata('pesan') ?></span>
      <div class="close-btn">
        <span class="fas fa-times"></span>
      </div>
    </div>
  <?php endif; ?>

  <?php if (session()->getFlashdata('logout')): ?>
    <div class="alert alert-success">
      <span class="fas fa-exclamation-circle"></span>
      <span class="msg"><?= session()->getFlashdata('logout') ?></span>
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

  <div class="wrapper">
    <img src="<?= base_url('logo/webgis.png') ?>" alt="Logo Web" style="display: block; margin: 0 auto 10px; max-width: 170px;">
    <h2>LOGIN ADMIN</h2>
    <?php echo form_open('Auth/CekLoginAdmin') ?>
    <?php $errors = session()->getFlashdata('errors'); ?>

    <div class="input-field">
      <input type="text" name="email" placeholder="Email" required>
      <label>Masukkan Email Terdaftar</label>
    </div>
    <p class="text-danger"><?= isset($errors['email']) ? $errors['email'] : '' ?></p>

    <div class="input-field">
      <input type="password" name="password" placeholder="Kata Sandi" required>
      <label>Masukkan Kata Sandi</label>
    </div>
    <p class="text-danger"><?= isset($errors['password']) ? $errors['password'] : '' ?></p>

    <!-- <div class="forget">
      <label for="remember">
        <input type="checkbox" id="remember">
        <p>Remember me</p>
      </label>
      <a href="#">Forgot password?</a>
    </div> -->
    <button type="submit" style="margin-top: 15px; margin-bottom:5px;">Masuk</button>
    <div class="register">
      <a href="<?= base_url('')?>">Masuk Sebagai User</a>
    </div>
    <?php echo form_close() ?>
  </div>

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