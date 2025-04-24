<div id="map" style="width: 100%; height: 650px;"></div>

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


        var wilayah = L.geoJSON(<?= $detailwilayah['geojson'] ?>, {
          fillColor: '<?= $detailwilayah['warna'] ?>',
          fillOpacity: 0.5,
        }) .addTo(map)
        .bindPopup("<b><?= $detailwilayah['nama_wilayah'] ?></b>")
        .openPopup();
        
   
   map.fitBounds(wilayah. getBounds());

   <?php foreach ($batalyon as $key => $value) { ?>
  var Icon = L.icon({
    iconUrl: '<?= base_url('marker/' . $value['marker']) ?>',
    iconSize:     [35, 50], // size of the icon
});

        L.marker([<?= $value['coordinate'] ?>], {
          icon: Icon
        })
        .bindPopup("<img src='<?= base_url('foto/' . $value['foto']) ?>' width='210px' height='150px'><br>" +
        "<b><?= $value['nama_batalyon'] ?></b><br>" +
        "Tahun dibentuk <?= $value['thn_dibentuk'] ?><br>" +
        "<?= $value['cabang'] ?><br><br>" +
        "<a class='btn btn-primary btn-xs text-white'>Detail</a>")
        .addTo(map);
    <?php } ?>
</script>
