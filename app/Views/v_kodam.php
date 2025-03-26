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

//Marker untuk Kodam
   //custom marker Kodam Iskandar Muda
   const marker1 = L.icon({
    iconUrl: 'http://localhost/gis-alutsistatni-ci4/public/marker/kodam_iskandar_muda.png',
    iconSize:     [30, 35], // size of the icon
});
    // Tambahkan marker ke peta
    L.marker([5.55596899085041, 95.32082497582446], {
        icon: marker1
      })
      .bindPopup("Kodam Iskandar Muda") // Popup saat diklik
      .bindTooltip("Kodam Iskandar Muda", { 
        permanent: false, 
        direction: "top",
        className: "custom-tooltip" // warna custom untuk Tooltip saat hover(kursor diarahkan ke marker) 
      }) // Tooltip saat hover
      .addTo(map);
    
   //custom marker Kodam 1 bukit barisan
   const marker2 = L.icon({
    iconUrl: 'http://localhost/gis-alutsistatni-ci4/public/marker/kodam_1.png',
    iconSize:     [30, 35], // size of the icon
});
    // Tambahkan marker ke peta
    L.marker([3.5938878829555216, 98.6224445846017], {
        icon: marker2
      })
      .bindPopup("Kodam 1 bukit barisan") // Popup saat diklik
      .bindTooltip("Kodam 1 bukit barisan", { 
        permanent: false, 
        direction: "top",
        className: "custom-tooltip" // warna custom untuk Tooltip saat hover(kursor diarahkan ke marker) 
      }) // Tooltip saat hover
      .addTo(map);

       //custom marker kodam 2 srwijaya
   const marker3 = L.icon({
    iconUrl: 'http://localhost/gis-alutsistatni-ci4/public/marker/kodam_2.png',
    iconSize:     [30, 35], // size of the icon
});
    // Tambahkan marker ke peta
    L.marker([-2.9677910940670538, 104.75086987882358], {
        icon: marker3
      })
      .bindPopup("kodam 2 sriwijaya") // Popup saat diklik
      .bindTooltip("kodam 2 sriwijaya", { 
        permanent: false, 
        direction: "top",
        className: "custom-tooltip" // warna custom untuk Tooltip saat hover(kursor diarahkan ke marker) 
      }) // Tooltip saat hover
      .addTo(map);

        //custom marker kodam jayakarta
   const marker4 = L.icon({
    iconUrl: 'http://localhost/gis-alutsistatni-ci4/public/marker/Lambang_Kodam_Jaya.png',
    iconSize:     [30, 35], // size of the icon
});
    // Tambahkan marker ke peta
    L.marker([-6.253477070439135, 106.87166512709278], {
        icon: marker4
      })
      .bindPopup("kodam jayakarta") // Popup saat diklik
      .bindTooltip("kodam jayakarta", { 
        permanent: false, 
        direction: "top",
        className: "custom-tooltip" // warna custom untuk Tooltip saat hover(kursor diarahkan ke marker) 
      }) // Tooltip saat hover
      .addTo(map);

    //custom marker kodam kodam 3 siliwangi
   const marker5 = L.icon({
    iconUrl: 'http://localhost/gis-alutsistatni-ci4/public/marker/kodam_3.png',
    iconSize:     [30, 35], // size of the icon
});
    // Tambahkan marker ke peta
    L.marker([-6.907092347920908, 107.61373058873356], {
        icon: marker5
      })
      .bindPopup("kodam 3 siliwangi") // Popup saat diklik
      .bindTooltip("kodam 3 siliwangi", { 
        permanent: false, 
        direction: "top",
        className: "custom-tooltip" // warna custom untuk Tooltip saat hover(kursor diarahkan ke marker) 
      }) // Tooltip saat hover
      .addTo(map);

    //custom marker kodam 4 diponegoro
   const marker6 = L.icon({
    iconUrl: 'http://localhost/gis-alutsistatni-ci4/public/marker/kodam_4.png',
    iconSize:     [30, 35], // size of the icon
});
    // Tambahkan marker ke peta
    L.marker([-7.085620150805416, 110.40735135948245], {
        icon: marker6
      })
      .bindPopup("kodam 4 diponegoro") // Popup saat diklik
      .bindTooltip("kodam 4 diponegoro", { 
        permanent: false, 
        direction: "top",
        className: "custom-tooltip" // warna custom untuk Tooltip saat hover(kursor diarahkan ke marker) 
      }) // Tooltip saat hover
      .addTo(map);

    //custom marker kodam 5 brawijaya
   const marker7 = L.icon({
    iconUrl: 'http://localhost/gis-alutsistatni-ci4/public/marker/kodam_5.png',
    iconSize:     [30, 35], // size of the icon
});
    // Tambahkan marker ke peta
    L.marker([-7.297171891295987, 112.7229304087743], {
        icon: marker7
      })
      .bindPopup("kodam 5 brawijaya") // Popup saat diklik
      .bindTooltip("kodam 5 brawijaya", { 
        permanent: false, 
        direction: "top",
        className: "custom-tooltip" // warna custom untuk Tooltip saat hover(kursor diarahkan ke marker) 
      }) // Tooltip saat hover
      .addTo(map);

    //custom marker kodam 9 udayana
   const marker8 = L.icon({
    iconUrl: 'http://localhost/gis-alutsistatni-ci4/public/marker/kodam_9.png',
    iconSize:     [30, 35], // size of the icon
});
    // Tambahkan marker ke peta
    L.marker([-8.656766953778549, 115.21638533272666], {
        icon: marker8
      })
      .bindPopup("kodam 9 udayana") // Popup saat diklik
      .bindTooltip("kodam 9 udayana", { 
        permanent: false, 
        direction: "top",
        className: "custom-tooltip" // warna custom untuk Tooltip saat hover(kursor diarahkan ke marker) 
      }) // Tooltip saat hover
      .addTo(map);

    //custom kodam 6 mulawarman
   const marker9 = L.icon({
    iconUrl: 'http://localhost/gis-alutsistatni-ci4/public/marker/kodam_6.png',
    iconSize:     [30, 35], // size of the icon
});
    // Tambahkan marker ke peta
    L.marker([-1.2785119436652304, 116.82204297339233], {
        icon: marker9
      })
      .bindPopup("kodam 6 mulawarman") // Popup saat diklik
      .bindTooltip("kodam 6 mulawarman", { 
        permanent: false, 
        direction: "top",
        className: "custom-tooltip" // warna custom untuk Tooltip saat hover(kursor diarahkan ke marker) 
      }) // Tooltip saat hover
      .addTo(map);

    //custom kodam 12 tanjungpura
   const marker10 = L.icon({
    iconUrl: 'http://localhost/gis-alutsistatni-ci4/public/marker/kodam_12.png',
    iconSize:     [30, 35], // size of the icon
});
    // Tambahkan marker ke peta
    L.marker([-0.07499249455448712, 109.37121998153681], {
        icon: marker10
      })
      .bindPopup("kodam 12 tanjungpura") // Popup saat diklik
      .bindTooltip("kodam 12 tanjungpura", { 
        permanent: false, 
        direction: "top",
        className: "custom-tooltip" // warna custom untuk Tooltip saat hover(kursor diarahkan ke marker) 
      }) // Tooltip saat hover
      .addTo(map);

    //custom kodam 13 merdeka
   const marker11 = L.icon({
    iconUrl: 'http://localhost/gis-alutsistatni-ci4/public/marker/kodam_13.png',
    iconSize:     [30, 35], // size of the icon
});
    // Tambahkan marker ke peta
    L.marker([1.4669818092751739, 124.84813514733563], {
        icon: marker11
      })
      .bindPopup("kodam 13 merdeka") // Popup saat diklik
      .bindTooltip("kodam 13 merdeka", { 
        permanent: false, 
        direction: "top",
        className: "custom-tooltip" // warna custom untuk Tooltip saat hover(kursor diarahkan ke marker) 
      }) // Tooltip saat hover
      .addTo(map);

    //custom kodam 14 hasanuddin
    const marker12 = L.icon({
    iconUrl: 'http://localhost/gis-alutsistatni-ci4/public/marker/kodam_14.png',
    iconSize:     [30, 35], // size of the icon
});
    // Tambahkan marker ke peta
    L.marker([-5.139313301949843, 119.4642139347958], {
        icon: marker12
      })
      .bindPopup("kodam 14 hasanuddin") // Popup saat diklik
      .bindTooltip("kodam 14 hasanuddin", { 
        permanent: false, 
        direction: "top",
        className: "custom-tooltip" // warna custom untuk Tooltip saat hover(kursor diarahkan ke marker) 
      }) // Tooltip saat hover
      .addTo(map);

    //custom kodam 15 pattimura
    const marker13 = L.icon({
    iconUrl: 'http://localhost/gis-alutsistatni-ci4/public/marker/kodam_15.png',
    iconSize:     [30, 35], // size of the icon
});
    // Tambahkan marker ke peta
    L.marker([-3.6897623789923, 128.18361213459315], {
        icon: marker13
      })
      .bindPopup("kodam 15 pattimura") // Popup saat diklik
      .bindTooltip("kodam 15 pattimura", { 
        permanent: false, 
        direction: "top",
        className: "custom-tooltip" // warna custom untuk Tooltip saat hover(kursor diarahkan ke marker) 
      }) // Tooltip saat hover
      .addTo(map);

    //custom kodam 17 cenderawasih
    const marker14 = L.icon({
    iconUrl: 'http://localhost/gis-alutsistatni-ci4/public/marker/kodam_17.png',
    iconSize:     [30, 35], // size of the icon
});
    // Tambahkan marker ke peta
    L.marker([-0.9263595121583827, 134.03656325337317], {
        icon: marker14
      })
      .bindPopup("kodam 17 cenderawasih") // Popup saat diklik
      .bindTooltip("kodam 17 cenderawasih", { 
        permanent: false, 
        direction: "top",
        className: "custom-tooltip" // warna custom untuk Tooltip saat hover(kursor diarahkan ke marker) 
      }) // Tooltip saat hover
      .addTo(map);

        //custom kodam 18 kasuari
        const marker15 = L.icon({
    iconUrl: 'http://localhost/gis-alutsistatni-ci4/public/marker/kodam_18.png',
    iconSize:     [30, 35], // size of the icon
});
    // Tambahkan marker ke peta
    L.marker([-2.55041995977606, 140.68750743502898], {
        icon: marker15
      })
      .bindPopup("kodam 18 kasuari") // Popup saat diklik
      .bindTooltip("kodam 18 kasuari", { 
        permanent: false, 
        direction: "top",
        className: "custom-tooltip" // warna custom untuk Tooltip saat hover(kursor diarahkan ke marker) 
      }) // Tooltip saat hover
      .addTo(map);
</script>