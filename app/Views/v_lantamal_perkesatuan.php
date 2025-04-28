<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" href="<?= base_url('css/styles.css') ?>">

<body>
    <div id="map" style="width: 100%; height: 650px;"></div>

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
            layers: [esriHybrid] // default layer
        });

        const baseMaps = {
            'Peta Standar': osm,
            'Peta Satelit': esriHybrid
        };

        const layerControl = L.control.layers(baseMaps).addTo(map);

        <?php foreach ($wilayah as $key => $value) { ?>
            L.geoJSON(<?= $value['geojson'] ?>, {
                    fillColor: '<?= $value['warna'] ?>',
                    fillOpacity: 0.5,
                })
                .bindPopup("<b><?= $value['nama_wilayah'] ?></b>")
                .addTo(map);
        <?php } ?>

        <?php foreach ($lantamal as $key => $value) { ?>
            var Icon = L.icon({
                iconUrl: '<?= base_url('marker/' . $value['marker']) ?>',
                iconSize: [40, 50],
            });

            L.marker([<?= $value['koordinat'] ?>], {
                    icon: Icon
                })
                .bindPopup(
                    `<div class="popup-container">
            <img src="<?= base_url('Gambar/Lantamal/Logo/' . $value['foto']) ?>" class="popup-img"><br>
           <h6 class="popup-title"><?= $value['nama_lantamal'] ?></h6>
            <div class="popup-content">
                <p><strong>Tanggal Didirikan:</strong> <?= $value['tgl_dibentuk'] ?></p>
                <p style="text-align: justify"><strong>Alamat:</strong> <?= $value['alamat'] ?></p>
                <p><strong>Daftar Jumlah Alutsista:</strong></p>
                <ul>
                    <li>Personel: <?= $value['jml_personil'] ?></li>
                    <li>Artileri: <?= $value['jml_artileri'] + $value['jml_artileri_2'] ?></li>
                    <li>Armada Kapal Selam: <?= $value['jml_armada_kapal_selam'] + $value['jml_armada_kapal_selam_2'] ?></li>
                    <li>Armada Kapal Permukaan: <?= $value['jml_armada_kapal_permukaan'] + $value['jml_armada_kapal_permukaan_2'] ?></li>
                </ul>
                <a class="btn btn-info btn-detail" href="#">Detail</a>
            </div>
        </div>`
                )
                .addTo(map);
        <?php } ?>
    </script>
</body>

</html>