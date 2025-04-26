<div class="col-md-12">
  <div class="card card-outline card-primary">
    <div class="card-header">
      <h3 class="card-title"><?= $judul ?></h3>
      <!-- /.card-tools -->
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <?php
      session();
      $validation = \Config\Services::validation();
      ?>
      <?php echo form_open_multipart('Batalyon/UpdateData/' . $batalyon['id_batalyon']) ?>

      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label>Nama Batalyon</label>
            <input name="nama_batalyon" value="<?= $batalyon['nama_batalyon'] ?>" placeholder="Nama Batalyon" class="form-control">
            <p class="text-danger"><?= $validation->hasError('nama_batalyon') ? $validation->getError('nama_batalyon') : '' ?></p>
          </div>
        </div>

        <div class="col-sm-2">
          <div class="form-group">
            <label>Tahun dibentuk</label>
            <input name="thn_dibentuk" value="<?= $batalyon['thn_dibentuk'] ?>" placeholder="Tahun dibentuk" class="form-control">
            <p class="text-danger"><?= $validation->hasError('thn_dibentuk') ? $validation->getError('thn_dibentuk') : '' ?></p>
          </div>
        </div>

        <div class="col-sm-2">
          <div class="form-group">
            <label>Cabang</label>
            <select name="cabang" class="form-control">
              <option value="<?= $batalyon['cabang'] ?>"><?= $batalyon['cabang'] ?></option>
              <option value="Kavaleri">Kavaleri</option>
              <option value="Infanteri">Infanteri</option>
            </select>
            <p class="text-danger"><?= $validation->hasError('cabang') ? $validation->getError('cabang') : '' ?></p>
          </div>
        </div>

        <div class="col-sm-2">
          <div class="form-group">
            <label>Komando</label>
            <select name="id_komando" class="form-control">
              <option value="">--Pilih Komando--</option>
              <?php foreach ($komando as $key => $value) { ?>
                <option value="<?= $value['id_komando'] ?>" <?= $value['id_komando'] == $batalyon['id_komando'] ? 'selected' : '' ?>><?= $value['komando'] ?></option>
              <?php } ?>

            </select>
            <p class="text-danger"><?= $validation->hasError('id_komando') ? $validation->getError('id_komando') : '' ?></p>
          </div>
        </div>
      </div>

      <div class="form-group">
        <label>Coordinate Batalyon</label>
        <div id="map" style="width: 100%; height: 500px;"></div>
        <input name="coordinate" id="Coordinate" value="<?= $batalyon['coordinate'] ?>" placeholder="Coordinate Batalyon" class="form-control" readonly>
        <p class="text-danger"><?= $validation->hasError('coordinate') ? $validation->getError('coordinate') : '' ?></p>
      </div>

      <div class="row">
        <div class="col-sm-4">
          <div class="form-group">
            <label>Provinsi</label>
            <select name="id_provinsi" id="id_provinsi" class="form-control select2" style="width: 100%;">
              <option value="">--Pilih Provinsi---</option>
              <?php foreach ($provinsi as $key => $value) { ?>
                <option value="<?= $value['id_provinsi'] ?>" <?= $value['id_provinsi'] == $batalyon['id_provinsi'] ? 'selected' : '' ?>><?= $value['nama_provinsi'] ?></option>
              <?php } ?>
            </select>
            <p class="text-danger"><?= $validation->hasError('id_provinsi') ? $validation->getError('id_provinsi') : '' ?></p>
          </div>
        </div>

        <div class="col-sm-4">
          <div class="form-group">
            <label>Kabupaten</label>
            <select name="id_kabupaten" id="id_kabupaten" class="form-control select2">
              <option value="<?= $batalyon['id_kabupaten'] ?>"><?= $batalyon['nama_kabupaten'] ?></option>
            </select>
            <p class="text-danger"><?= $validation->hasError('id_kabupaten') ? $validation->getError('id_kabupaten') : '' ?></p>
          </div>
        </div>

        <div class="col-sm-4">
          <div class="form-group">
            <label>Kecamatan</label>
            <select name="id_kecamatan" id="id_kecamatan" class="form-control select2">
              <option value="<?= $batalyon['id_kecamatan'] ?>"><?= $batalyon['nama_kecamatan'] ?></option>
            </select>
            <p class="text-danger"><?= $validation->hasError('id_kecamatan') ? $validation->getError('id_kecamatan') : '' ?></p>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-8">
          <div class="form-group">
            <label>Alamat</label>
            <input name="alamat" value="<?= $batalyon['alamat'] ?>" placeholder="Alamat Batalyon" class="form-control">
            <p class="text-danger"><?= $validation->hasError('alamat') ? $validation->getError('alamat') : '' ?></p>
          </div>
        </div>

        <div class="col-sm-4">
          <div class="form-group">
            <label>Wilayah Administrasi</label>
            <select name="id_wilayah" class="form-control">
              <option value="">--Pilih Wilayah Administrasi---</option>
              <?php foreach ($wilayah as $key => $value) { ?>
                <option value="<?= $value['id_wilayah'] ?>" <?= $value['id_wilayah'] == $batalyon['id_wilayah'] ? 'selected' : '' ?>><?= $value['nama_wilayah'] ?></option>
              <?php } ?>
            </select>
            <p class="text-danger"><?= $validation->hasError('id_wilayah') ? $validation->getError('id_wilayah') : '' ?></p>
          </div>
        </div>
      </div>

      <div class="form-group">
        <label>Ganti Foto Batalyon</label>
        <input type="file" accept=".png" name="foto" value="<?= old('foto') ?> " class="form-control">
        <p class="text-danger"><?= $validation->hasError('foto') ? $validation->getError('foto') : '' ?></p>
      </div>


      <button class="btn btn-primary btn-flat" type="submit">Simpan</button>
      <a href="<?= base_url('Batalyon') ?> " class="btn btn-success btn-flat">Kembali</a>

      <?php echo form_close() ?>

    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    //Initialize Select2 Elements
    $('.select2').select2();

    $('#id_provinsi').change(function() {
      var id_provinsi = $('#id_provinsi').val();
      $.ajax({
        type: "POST",
        url: "<?= base_url('Batalyon/Kabupaten') ?>",
        data: {
          id_provinsi: id_provinsi,
        },
        success: function(response) {
          $('#id_kabupaten').html(response);
        }
      });
    });

    $('#id_kabupaten').change(function() {
      var id_kabupaten = $('#id_kabupaten').val();
      $.ajax({
        type: "POST",
        url: "<?= base_url('Batalyon/Kecamatan') ?>",
        data: {
          id_kabupaten: id_kabupaten,
        },
        success: function(response) {
          $('#id_kecamatan').html(response);
        }
      });
    });
  });
</script>

<script>
  const cities = L.layerGroup();
  const Jakarta = L.marker([-6.19675108223824, 106.82121845234977]).bindPopup('This is Jakarta').addTo(cities);
  const mLittleton = L.marker([39.61, -105.02]).bindPopup('This is Littleton, CO.').addTo(cities);
  const mDenver = L.marker([39.74, -104.99]).bindPopup('This is Denver, CO.').addTo(cities);
  const mAurora = L.marker([39.73, -104.8]).bindPopup('This is Aurora, CO.').addTo(cities);
  const mGolden = L.marker([39.77, -105.23]).bindPopup('This is Golden, CO.').addTo(cities);
  const osm = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
  });

  const osmHOT = L.tileLayer('https://{s}.tile.openstreetmap.fr/hot/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Tiles style by <a href="https://www.hotosm.org/" target="_blank">Humanitarian OpenStreetMap Team</a> hosted by <a href="https://openstreetmap.fr/" target="_blank">OpenStreetMap France</a>'
  });

  const map = L.map('map', {
    center: [<?= $batalyon['coordinate'] ?>],
    zoom: <?= $web['zoom_view'] ?>,
    layers: [osm]
  });

  const baseMaps = {
    'OpenStreetMap': osm,
    'OpenStreetMap.HOT': osmHOT
  };

  const overlays = {
    'Cities': cities
  };

  const layerControl = L.control.layers(baseMaps, overlays).addTo(map);

  var coordinateInput = document.querySelector("[name=coordinate]");

  var curLocation = [<?= $batalyon['coordinate'] ?>];
  map.attributionControl.setPrefix(false);
  var marker = new L.marker(curLocation, {
    draggable: 'true',
  });

  //mengambil coordinate saat marker di geser
  marker.on('dragend', function(e) {
    var position = marker.getLatLng();
    marker.setLatLng(position, {
      curLocation
    }).bindPopup(position).update();
    $("#Coordinate").val(position.lat + "," + position.lng);
  });

  //mengambil coordinate saat map onclick
  map.on("click", function(e) {
    var lat = e.latlng.lat;
    var lng = e.latlng.lng;
    if (!marker) {
      marker = L.marker(e.latlng).addTo(map);
    } else {
      marker.setLatLng(e.latlng);
    }
    coordinateInput.value = lat + ',' + lng;
  });

  map.addLayer(marker);


  const crownHill = L.marker([39.75, -105.09]).bindPopup('This is Crown Hill Park.');
  const rubyHill = L.marker([39.68, -105.00]).bindPopup('This is Ruby Hill Park.');
  const kavaleri_1 = L.marker([-6.315912188653794, 106.85422580760677]).bindPopup('This is Kavaleri_1.');
  const batalyon = L.layerGroup([crownHill, rubyHill, kavaleri_1]);

  const openTopoMap = L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: 'Map data: &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, <a href="http://viewfinderpanoramas.org">SRTM</a> | Map style: &copy; <a href="https://opentopomap.org">OpenTopoMap</a> (<a href="https://creativecommons.org/licenses/by-sa/3.0/">CC-BY-SA</a>)'
  });
  layerControl.addBaseLayer(openTopoMap, 'OpenTopoMap');
  layerControl.addOverlay(batalyon, 'Batalyon')
</script>