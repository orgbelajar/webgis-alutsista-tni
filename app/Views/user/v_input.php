<div class="col-md-12" style="margin-top: 10px;">
  <div class="card card-outline card-primary">
    <div class="card-header">
      <p class="card-title" style="font-size: 21px;"><strong><?= $judul ?></strong></p>


      <!-- /.card-tools -->
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <?php
      session();
      $validation = \Config\Services::validation();
      ?>
      <?php echo form_open_multipart('User/Insert') ?>
      <div class="form-group">
        <label>Nama User <span class="text-danger" data-toggle="tooltip" title="Wajib diisi">*</span></label>
        <input type="text" name="nama_user" value="<?= old('nama_user') ?>" placeholder="Masukkan Nama User" class="form-control" required>
        <p class="text-danger"><?= $validation->hasError('nama_user') ? $validation->getError('nama_user') : '' ?></p>
      </div>

      <div class="form-group">
        <label>Email <span class="text-danger" data-toggle="tooltip" title="Wajib diisi">*</span></label>
        <input type="email" name="email" value="<?= old('email') ?>" placeholder="Masukkan Alamat Email" class="form-control" required>
        <p class="text-danger"><?= $validation->hasError('email') ? $validation->getError('email') : '' ?></p>
      </div>

      <div class="form-group">
        <label>Password <span class="text-danger" data-toggle="tooltip" title="Wajib diisi" minlength="8">*</span></label>
        <input type="text" name="password" value="<?= old('password') ?>" placeholder="Masukkan Password Minimal 8 Karakter" class="form-control" required>
        <p class="text-danger"><?= $validation->hasError('password') ? $validation->getError('password') : '' ?></p>
      </div>

      <div class="form-group">
        <label>Foto Profil (PNG) <span class="text-danger" data-toggle="tooltip" title="Wajib diisi">*</span></label>
        <input type="file" accept=".png" name="foto" placeholder="Foto Profil" class="form-control" required>
        <p class="text-danger"><?= $validation->hasError('foto') ? $validation->getError('foto') : '' ?></p>
      </div>

      <div class="d-flex justify-content-end mt-5">
        <a href="<?= base_url('User') ?>" class="btn btn-success btn-flat mr-2">Kembali</a>
        <button class="btn btn-primary btn-flat" type="submit">Simpan</button>
      </div>

      <?php echo form_close() ?>

    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>