<div class="col-sm-6">
    <div id="map" style="width: 100%; height: 500px;"></div>
</div>

<div class="col-sm-6">
    <img src="<?= base_url('foto/' . $batalyon['foto']) ?>" width="100%" height="500px">
</div>

<div class="col-sm-12">
    <table class="table table-bordered table-sm">
        <tr>
            <th width="180px">Nama Komando</th>
            <th width="50px" class="text-center">:</th>
            <td><?= $batalyon['nama_batalyon'] ?></td>
        </tr>
        <tr>
            <th>Komando Batalyon</th>
            <th class="text-center">:</th>
            <td><?= $batalyon['komando'] ?></td>
        </tr>
        <tr>
            <th>Tahun Dibentuk</th>
            <th class="text-center">:</th>
            <td><?= $batalyon['thn_dibentuk'] ?></td>
        </tr>
        <tr>
            <th>Cabang Batalyon</th>
            <th class="text-center">:</th>
            <td><?= $batalyon['cabang'] ?></td>
        </tr>
        <tr>
            <th>Alamat Batalyon</th>
            <th class="text-center">:</th>
            <td><?= $batalyon['alamat'] ?>, Prov. <?= $batalyon['nama_provinsi'] ?>, Kab. <?= $batalyon['nama_kabupaten'] ?>, , Kec. <?= $batalyon['nama_kecamatan'] ?></td>
        </tr>
    </table>
</div>

<script>
    var cities = L.layerGroup();
    var Jakarta = L.marker([-6.19675108223824, 106.82121845234977]).bindPopup('This is Jakarta').addTo(cities);
    var mLittleton = L.marker([39.61, -105.02]).bindPopup('This is Littleton, CO.').addTo(cities);
    var mDenver = L.marker([39.74, -104.99]).bindPopup('This is Denver, CO.').addTo(cities);
    var mAurora = L.marker([39.73, -104.8]).bindPopup('This is Aurora, CO.').addTo(cities);
    var mGolden = L.marker([39.77, -105.23]).bindPopup('This is Golden, CO.').addTo(cities);
    var osm = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    });

    var osmHOT = L.tileLayer('https://{s}.tile.openstreetmap.fr/hot/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Tiles style by <a href="https://www.hotosm.org/" target="_blank">Humanitarian OpenStreetMap Team</a> hosted by <a href="https://openstreetmap.fr/" target="_blank">OpenStreetMap France</a>'
    });

    var map = L.map('map', {
        center: [<?= $batalyon['coordinate'] ?>],
        zoom: <?= $web['zoom_view'] ?>,
        layers: [osm]
    });

    var baseMaps = {
        'OpenStreetMap': osm,
        'OpenStreetMap.HOT': osmHOT
    };

    var overlays = {};

    var layerControl = L.control.layers(baseMaps, overlays).addTo(map);

    L.marker([<?= $batalyon['coordinate'] ?>]).addTo(map);
</script>