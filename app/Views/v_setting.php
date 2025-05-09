<div class="col-md-12" style="margin-top: 10px;">
  <div class="card card-outline card-primary">
    <div class="card-header">
      <h3 class="card-title"><?= $judul ?></h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
          <i class="fas fa-minus"></i>
        </button>
      </div>
      <!-- /.card-tools -->
    </div>
    <!-- /.card-header -->
    <div class="card-body">

      <?php
      if (session()->getFlashdata('pesan')) {
        echo '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i>';
        echo session()->getFlashdata('pesan');
        echo '</h5></div>';
      }

      ?>

      <?php echo form_open('Admin/UpdateSetting') ?>



      <div class="row">
        <div class="col-sm-7">
          <div class="form-group">
            <label>Nama Website</label>
            <input name="nama_web" value="<?= $web['nama_web'] ?>" class="form-control" placeholder="Nama Website" required>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <label>Coordinate Wilayah</label>
            <input id="Koordinat" name="coordinate_wilayah" value="<?= $web['coordinate_wilayah'] ?>" class="form-control" placeholder="Latitude, Longitude" required>
          </div>
        </div>
        <div class="col-sm-2">
          <div class="form-group">
            <label>Zoom View</label>
            <input type="number" value="<?= $web['zoom_view'] ?>" name="zoom_view" min="0" max="20" class="form-control" placeholder="Zoom View" required>
          </div>
        </div>
      </div>


      <button class="btn btn-primary" type="submit">Simpan</button>



      <?php echo form_close() ?>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>


<div class="col-md-12">
  <div id="map" style="width: 100%; height: 650px;"></div>
</div>




<script>
  // URL dan attribution untuk peta
  const esri_url = 'https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}';
  const esri_attribution = 'Tiles © Esri — Source: Esri, i-cubed, USDA, USGS, AEX, GeoEye, Getmapping, Aerogrid, IGN, IGP, UPR-EGP, and the GIS User Community';

  // Tambahan: URL untuk label jalan (street names)
  const esri_labels_url = 'https://services.arcgisonline.com/ArcGIS/rest/services/Reference/World_Boundaries_and_Places/MapServer/tile/{z}/{y}/{x}';
  const esri_labels_attribution = 'Labels © Esri — Source: Esri and the GIS Community';

  const osm = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
  });

  const esriSatellite = L.tileLayer(esri_url, {
    maxZoom: 30,
    attribution: esri_attribution
  });

  // Tambahan: layer untuk label jalan
  const esriLabels = L.tileLayer(esri_labels_url, {
    maxZoom: 30,
    attribution: esri_labels_attribution,
    pane: 'overlayPane', // supaya label tampil di atas layer lain
    opacity: 1
  });

  // Bikin layer group Hybrid: gabungan Satelit + Label
  const esriHybrid = L.layerGroup([esriSatellite, esriLabels]);

  const map = L.map('map', {
    center: [<?= $web['coordinate_wilayah'] ?>],
    zoom: <?= $web['zoom_view'] ?>,
    layers: [osm] // default layer
  });

  const baseMaps = {
    'Peta Standar': osm,
    'Peta Satelit': esriHybrid
  };

  const layerControl = L.control.layers(baseMaps).addTo(map);

  var coordinateInput = document.querySelector("[name=koordinat]");

  var curLocation = [<?= $web['coordinate_wilayah'] ?>];
  map.attributionControl.setPrefix(false);

  var marker = new L.marker(curLocation, {
    draggable: 'true',
  }).addTo(map);

  // Update posisi marker saat drag
  marker.on('dragend', function(e) {
    var position = marker.getLatLng();
    marker.setLatLng(position).bindPopup(position).update();
    $("#Koordinat").val(position.lat + ", " + position.lng);
  });

  // Update posisi marker saat map diklik
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

  // Update posisi marker saat koordinat input diketik
  coordinateInput.addEventListener('input', function(e) {
    var value = e.target.value;
    var parts = value.split(',');
    if (parts.length === 2) {
      var lat = parseFloat(parts[0]);
      var lng = parseFloat(parts[1]);
      if (!isNaN(lat) && !isNaN(lng)) {
        var newLatLng = new L.LatLng(lat, lng);
        marker.setLatLng(newLatLng);
        map.setView(newLatLng, map.getZoom());
      }
    }
  });

  map.addLayer(marker);
</script>