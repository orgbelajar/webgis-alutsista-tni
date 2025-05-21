<!-- ./col -->
<div class="col-lg-4 col-4" style="margin-top: 20px;">
  <!-- small box -->
  <div class="small-box bg-secondary">
    <div class="inner">
      <h3><?= $jmlkodam ?></h3>
      <p>Kodam</p>
    </div>
    <div class="icon-kesatuan">
      <img src="<?= base_url('Gambar/Logo_TNI_AD_1.png') ?>" alt="Kodam" style="width:60px; height:auto;">
    </div>
  </div>
</div>

<style>
 .icon-kesatuan {
  position: absolute;
  top: 10px;
  right: 10px;
  margin-right: 5px;
}

 .icon-kesatuan img {
  transition: transform 0.3s ease;
}

 .icon-kesatuan img:hover {
  transform: scale(1.1);
}

.icon-submarine {
  position: absolute;
  top: 0px;
  right: 10px;
  margin-right: 5px;
}

 .icon-submarine img {
  transition: transform 0.3s ease;
}

 .icon-submarine img:hover {
  transform: scale(1.1);
}

.icon-amunisi {
  position: absolute;
  top: 10px;
  right: 10px;
  margin-right: 0px;
}

 .icon-amunisi img {
  transition: transform 0.3s ease;
}

 .icon-amunisi img:hover {
  transform: scale(1.1);
}

.icon-tank {
  position: absolute;
  top: 10px;
  right: 10px;
  margin-right: 5px;
}

 .icon-tank img {
  transition: transform 0.3s ease;
}

 .icon-tank img:hover {
  transform: scale(1.1);
}
</style>

<div class="col-lg-4 col-4">
  <!-- small box -->
  <div class="small-box bg-secondary" style="margin-top: 20px;">
    <div class="inner">
      <h3><?= $jmllantamal ?></h3>
      <p>Lantamal</p>
    </div>
    <div class="icon-kesatuan">
      <!-- <i class="fas fa-solid fa-person-military-rifle"></i> -->
      <img src="<?= base_url('Gambar/Lambang_TNI_AL_2.png') ?>" alt="Lantamal" style="width:auto; height:90px;">
    </div>
  </div>
</div>

<div class="col-lg-4 col-4">
  <!-- small box -->
  <div class="small-box bg-secondary" style="margin-top: 20px;">
    <div class="inner">
      <h3><?= $jmlkoopsud ?></h3>
      <p>Koopsud</p>
    </div>
    <div class="icon-kesatuan">
      <img src="<?= base_url('Gambar/Lambang_TNI_AU_1.png') ?>" alt="Koopsud" style="width:auto; height:88px;">
    </div>
  </div>
</div>
<!-- Small boxes (Stat box) -->


<div class="col-lg-4 col-4">
  <!-- small box -->
  <div class="small-box bg-olive">
    <div class="inner">
      <h3><?= $total_artileri ?></h3>
      <p>Total Alutsista Artileri</p>
    </div>
    <div class="icon">
      <!-- <i class="fas fa-layer-group"></i> -->
      <i class="fas fa-solid fa-truck-plane" style="color: white;"></i>
    </div>
  </div>
</div>

<div class="col-lg-4 col-4">
  <!-- small box -->
  <div class="small-box bg-navy">
    <div class="inner">
      <h3><?= $total_artileri_lantamal ?></h3>
      <p>Total Alutsista Artileri</p>
    </div>
    <div class="icon">
      <!-- <i class="fas fa-layer-group"></i> -->
      <i class="fas fa-solid fa-truck-plane" style="color: white;"></i>
    </div>
  </div>
</div>

<div class="col-lg-4 col-4">
  <!-- small box -->
  <div class="small-box bg-info">
    <div class="inner">
      <h3><?= $total_amunisi ?></h3>
      <p>Total Alutsista Amunisi</p>
    </div>
    <div class="icon-amunisi">
      <img src="<?= base_url('Gambar/amunisi.png') ?>" alt="Amunisi" style="width:auto; height:90px;">
    </div>
  </div>
</div>

<div class="col-lg-4 col-4">
  <!-- small box -->
  <div class="small-box bg-olive">
    <div class="inner">
      <h3><?= $total_tank ?></h3>
      <p>Total Alutsista Tank</p>
    </div>
    <div class="icon-tank">
      <img src="<?= base_url('Gambar/tank.png') ?>" alt="Tank" style="width:auto; height:88px;">
    </div>
  </div>
</div>

<div class="col-lg-4 col-4">
  <!-- small box -->
  <div class="small-box bg-navy">
    <div class="inner">
      <h3><?= $total_kapal_selam ?></h3>
      <p>Total Alutsista Kapal Selam</p>
    </div>
    <div class="icon-submarine">
      <!-- <i class="fas fa-layer-group"></i> -->
       <img src="<?= base_url('Gambar/submarine.png') ?>" alt="Kapal Selam" style="width:110px; height:auto;">
    </div>
  </div>
</div>

<div class="col-lg-4 col-4">
  <!-- small box -->
  <div class="small-box bg-info">
    <div class="inner">
      <h3><?= $total_pertahanan_udara ?></h3>
      <p>Total Alutsista Pertahanan Udara</p>
    </div>
    <div class="icon">
      <i class="fas fa-solid fa-plane-circle-exclamation" style="color: white;"></i>
    </div>
  </div>
</div>

<div class="col-lg-4 col-4">
  <!-- small box -->
  <div class="small-box bg-olive">
    <div class="inner">
      <h3><?= $total_helikopter ?></h3>
      <p>Total Alutsista Helikopter</p>
    </div>
    <div class="icon">
      <i class="fas fa-solid fa-helicopter" style="color: white;"></i>
    </div>
  </div>
</div>

<div class="col-lg-4 col-4">
  <!-- small box -->
  <div class="small-box bg-navy">
    <div class="inner">
      <h3><?= $total_kapal_permukaan ?></h3>
      <p>Total Alutsista Kapal Permukaan</p>
    </div>
    <div class="icon">
      <i class="fas fa-solid fa-ship" style="color: white;"></i>
    </div>
  </div>
</div>

<div class="col-lg-4 col-4">
  <!-- small box -->
  <div class="small-box bg-info">
    <div class="inner">
      <h3><?= $total_pesawat_terbang ?></h3>
      <p>Total Alutsista Pesawat Terbang</p>
    </div>
    <div class="icon">
      <i class="fas fa-solid fa-jet-fighter-up" style="color: white"></i>
    </div>
  </div>
</div>