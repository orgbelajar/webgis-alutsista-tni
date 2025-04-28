<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">


<!-- ./col -->
<div class="col-lg-6 col-6">
  <!-- small box -->
  <div class="small-box bg-secondary">
    <div class="inner">
      <h3><?= $jmlkodam ?></h3>

      <p>Kodam</p>
    </div>
    <div class="icon">
      <i class="fas fa-solid fa-person-military-rifle"></i>
    </div>
    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
  </div>
</div>
<!-- Small boxes (Stat box) -->
<div class="col-lg-6 col-6">
  <!-- small box -->
  <div class="small-box bg-olive">
    <div class="inner">
      <h3><?= $jmlwilayah ?></h3>

      <p>Wilayah</p>
    </div>
    <div class="icon">
      <i class="fas fa-layer-group"></i>
    </div>
    <a href="<?= base_url('Kodam') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
  </div>
</div>

<?php
$db = \Config\Database::connect();
foreach ($kesatuan as $key => $value) {
  $jml = $db->table('tbl_kodam,')->where('id_kesatuan', $value['id'])->countAllResults();
?>
  <!-- ./col -->
  <div class="col-lg-3 col-3">
    <!-- small box -->
    <div class="small-box <?php if ($value['id'] == 1) {
                            echo 'bg-success';
                          } elseif ($value['id'] == 2) {
                            echo 'bg-primary';
                          } elseif ($value['id'] == 3) {
                            echo 'bg-info';
                          } ?>">
      <div class="inner">
        <h3><?= $jml ?></h3>

        <p><?= $value['kesatuan'] ?></p>
      </div>
      <div class="icon">
        <i class="fas fa-solid fa-person-military-rifle"></i>
      </div>
      <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
<?php } ?>