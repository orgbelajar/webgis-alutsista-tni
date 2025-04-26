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
      <?php echo form_open_multipart('Batalyon/InsertDataKodam') ?>

      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label>Nama Kodam</label>
            <input name="nama_kodam" value="<?= old('nama_kodam') ?>" placeholder="Nama Kodam" class="form-control">
            <p class="text-danger"><?= $validation->hasError('nama_kodam') ? $validation->getError('nama_kodam') : '' ?></p>
          </div>
        </div>

        <div class="col-sm-2">
          <div class="form-group">
            <label>Kesatuan</label>
            <select name="id_kesatuan" class="form-control">
              <option value="">--Pilih Kesatuan--</option>
              <?php foreach ($kesatuan as $key => $value) { ?>
                <option value="<?= $value['id'] ?>"><?= $value['kesatuan'] ?></option>
              <?php } ?>

            </select>
            <p class="text-danger"><?= $validation->hasError('id') ? $validation->getError('id') : '' ?></p>
          </div>
        </div>

        <div class="col-sm-2">
          <div class="form-group">
            <label>Tanggal Didirikan</label>
            <input name="tgl_dibentuk" value="<?= old('tgl_dibentuk') ?>" placeholder="Tanggal Didirikan" class="form-control">
            <p class="text-danger"><?= $validation->hasError('tgl_dibentuk') ? $validation->getError('tgl_dibentuk') : '' ?></p>
          </div>
        </div>
      </div>

      <div class="form-group">
        <label>Koordinat Kodam</label>
        <div id="map" style="width: 100%; height: 500px;"></div>
        <input name="koordinat" id="Koordinat" value="<?= old('koordinat') ?>" placeholder="Koordinat Kodam" class="form-control" readonly>
        <p class="text-danger"><?= $validation->hasError('koordinat') ? $validation->getError('koordinat') : '' ?></p>
      </div>

      <div class="row">
        <div class="col-sm-4">
          <div class="form-group">
            <label>Wilayah Administrasi</label>
            <select name="id_wilayah" class="form-control">
              <option value="">--Pilih Wilayah Administrasi---</option>
              <?php foreach ($wilayah as $key => $value) { ?>
                <option value="<?= $value['id'] ?>"><?= $value['nama_wilayah'] ?></option>
              <?php } ?>
            </select>
            <p class="text-danger"><?= $validation->hasError('id') ? $validation->getError('id') : '' ?></p>
          </div>
        </div>

        <div class="col-sm-4">
          <div class="form-group">
            <label>Kabupaten</label>
            <select name="id_kabupaten" id="id_kabupaten" class="form-control select2">
            </select>
            <p class="text-danger"><?= $validation->hasError('id_kabupaten') ? $validation->getError('id_kabupaten') : '' ?></p>
          </div>
        </div>

        <div class="col-sm-4">
          <div class="form-group">
            <label>Kecamatan</label>
            <select name="id_kecamatan" id="id_kecamatan" class="form-control select2">
            </select>
            <p class="text-danger"><?= $validation->hasError('id_kecamatan') ? $validation->getError('id_kecamatan') : '' ?></p>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-8">
          <div class="form-group">
            <label>Alamat</label>
            <input name="alamat" value="<?= old('alamat') ?>" placeholder="Alamat Kodam" class="form-control">
            <p class="text-danger"><?= $validation->hasError('alamat') ? $validation->getError('alamat') : '' ?></p>
          </div>
        </div>
      </div>

      <div class="form-group">
        <label>Foto Kodam</label>
        <input type="file" accept=".png" name="foto" value="<?= old('foto') ?> " class="form-control" required>
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
    center: [<?= $web['coordinate_wilayah'] ?>],
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

  var curLocation = [<?= $web['coordinate_wilayah'] ?>];
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