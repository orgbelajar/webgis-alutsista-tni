<div class="col-md-12" style="margin-top: 10px;">
  <div class="card card-outline card-primary">
    <div class="card-header">
    <p class="card-title"  style="font-size: 21px;"><strong><?= $judul ?></strong></p>


      <!-- /.card-tools -->
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <?php
      //notif insert data
      if (session()->getFlashdata('insert')) {
        echo '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i>';
        echo session()->getFlashdata('insert');
        echo '</h5></div>';
      }

      //notif update data
      if (session()->getFlashdata('update')) {
        echo '<div class="alert alert-primary alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i>';
        echo session()->getFlashdata('update');
        echo '</h5></div>';
      }

      //notif update data
      if (session()->getFlashdata('delete')) {
        echo '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i>';
        echo session()->getFlashdata('delete');
        echo '</h5></div>';
      }

      ?>
      <table id="example2" class="table table-bordered table-striped">
        <thead>
          <tr class="text-center">
            <th width="50px">No</th>
            <th>Kesatuan</th>
            <th>Marker</th>
            <th width="150px">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1;
          foreach ($kesatuan as $key => $value) { ?>
            <tr>
              <td class="text-center"><?= $no++ ?></td>
              <td class="text-center"><?= $value['kesatuan'] ?></td>
              <td class="text-center"><img src="<?= base_url('marker/' . $value['marker']) ?>" width="75px" height="90px"></td>
              <td class="text-center">
                <button data-toggle="modal" data-target="#edit<?= $value['id'] ?>" class="btn btn-sm btn-warning btn-flat"><i class="fas fa-map-marker-alt"></i> Ganti Marker</button>
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

<?php foreach ($kesatuan as $key => $value) { ?>
  <div class="modal fade" id="edit<?= $value['id'] ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Ganti Marker <?= $value['kesatuan'] ?></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <?php echo form_open_multipart('Kesatuan/UpdateData/' . $value['id']) ?>
        <div class="modal-body">

          <div class="form-group">
            <label>Upload Marker</label>
            <input type="file" name="marker" class="form-control" accept="image/png" required>
          </div>

        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>

        <?php echo form_close() ?>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>

<?php } ?>