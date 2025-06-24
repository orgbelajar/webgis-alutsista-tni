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
      <?php echo form_open_multipart('User/Update/' . $user['id_user']) ?>
      <div class="form-group">
        <label>Nama User <span class="text-danger" data-toggle="tooltip" title="Wajib diisi">*</span></label>
        <input name="nama_user" value="<?= $user['nama_user'] ?>" placeholder="Ubah Nama User" class="form-control" required>
        <p class="text-danger"><?= $validation->hasError('nama_user') ? $validation->getError('nama_user') : '' ?></p>
      </div>

      <div class="form-group">
        <label>Email <span class="text-danger" data-toggle="tooltip" title="Wajib diisi">*</span></label>
        <input name="email" value="<?= $user['email'] ?>" placeholder="Ubah Alamat Email" class="form-control" required>
        <p class="text-danger"><?= $validation->hasError('email') ? $validation->getError('email') : '' ?></p>
      </div>

      <div class="form-group">
        <label>Password</label>
        <input name="password" placeholder="Ubah Password Minimal 8 Karakter" class="form-control" minlength="8">
        <p class="text-danger"><?= $validation->hasError('password') ? $validation->getError('password') : '' ?></p>
      </div>

      <div class="form-group">
        <label>Foto Profil (PNG)</label>
        <input type="file" accept=".png" name="foto" value="<?= old('foto') ?>" placeholder="Ubah Foto Profil" class="form-control">
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