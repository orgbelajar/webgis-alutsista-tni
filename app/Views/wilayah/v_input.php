<div class="col-md-12">
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title"><?= $judul ?></h3>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">

              <?php echo form_open() ?>

              <div class="row">
                <div class="col-sm-6">
                <div class="form-group">
                <label>Nama Wilayah</label>
                <input name="nama_wilayah" class="form-control">
            </div>
                </div>

                <div class="col-sm-6">
                <div class="form-group">
                <label>Warna Wilayah</label>
                <input name="warna" class="form-control my-colorpicker1">
                    </div>
                </div>
              </div>



              <script>
                 //Colorpicker
                $('.my-colorpicker1').colorpicker()
                //color picker with addon
                $('.my-colorpicker2').colorpicker()
              </script>
 





              <?php echo form_close() ?>

        </div>
    </div>
</div>