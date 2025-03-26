<div class="col-md-12">
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
                    <input name="coordinate_wilayah" value="<?= $web['coordinate_wilayah'] ?>" class="form-control" placeholder="Coordinate Wilayah" required>
                        </div>
                    </div>
                    <div class="col-sm-2">
                    <div class="form-group">
                    <label>Zoom View</label>
                    <input type="number" value="<?= $web['zoom_view'] ?>" name="zoom_view" min="0" max="20"  class="form-control" placeholder="Zoom View" required>
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

          <style>
    .custom-tooltip {
        color: #008000 !important;
        background-color: white !important;
        border: 2px solid #008000 !important;
        font-weight: bold;
        padding: 5px;
        border-radius: 5px;
        text-align: center;
    }
</style>

          

<script>
const cities = L.layerGroup();
const Jakarta = L.marker([-6.19675108223824, 106.82121845234977]).bindPopup('This is Jakarta').addTo(cities);
const Tangerang = L.marker([-6.177487755447253, 106.62778895684743]).bindPopup('This is Tangerang').addTo(cities);
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
layers: [osm, cities]
});

const baseMaps = {
'OpenStreetMap': osm,
'OpenStreetMap.HOT': osmHOT
};

const overlays = {
'Cities': cities
};

const layerControl = L.control.layers(baseMaps, overlays).addTo(map);

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

//Marker untuk Lantamal
   //custom marker Lantamal 1
   const marker1 = L.icon({
    iconUrl: 'http://localhost/gis-alutsistatni-ci4/public/marker/Lantamal_1.png',
    iconSize:     [30, 35], // size of the icon
});
    // Tambahkan marker ke peta
    L.marker([3.784346058506001, 98.68230445464299], {
        icon: marker1
      })
      .bindPopup("Lantamal 1") // Popup saat diklik
      .bindTooltip("Lantamal 1", { 
        permanent: false, 
        direction: "top",
        className: "custom-tooltip" // warna custom untuk Tooltip saat hover(kursor diarahkan ke marker) 
      }) // Tooltip saat hover
      .addTo(map);


        //custom marker Lantamal 2
   const marker2 = L.icon({
    iconUrl: 'http://localhost/gis-alutsistatni-ci4/public/marker/Lantamal_2.png',
    iconSize:     [30, 35], // size of the icon
});
    // Tambahkan marker ke peta
    L.marker([-1.0036208482513533, 100.36561127180553], {
        icon: marker2
      })
      .bindPopup("Lantamal 2") // Popup saat diklik
      .bindTooltip("Lantamal 2", { 
        permanent: false, 
        direction: "top",
        className: "custom-tooltip" // warna custom untuk Tooltip saat hover(kursor diarahkan ke marker) 
      }) // Tooltip saat hover
      .addTo(map);


        //custom marker Lantamal 3
   const marker3 = L.icon({
    iconUrl: 'http://localhost/gis-alutsistatni-ci4/public/marker/Lantamal_2.png',
    iconSize:     [30, 35], // size of the icon
});
    // Tambahkan marker ke peta
    L.marker([-1.0036208482513533, 100.36561127180553], {
        icon: marker3
      })
      .bindPopup("Lantamal 3") // Popup saat diklik
      .bindTooltip("Lantamal 3", { 
        permanent: false, 
        direction: "top",
        className: "custom-tooltip" // warna custom untuk Tooltip saat hover(kursor diarahkan ke marker) 
      }) // Tooltip saat hover
      .addTo(map);

      </script>