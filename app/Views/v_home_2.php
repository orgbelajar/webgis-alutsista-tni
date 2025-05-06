<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= base_url('css/styles.css') ?>">
</head>

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
            layers: [osm] // default layer
        });

        const baseMaps = {
            'Peta Standar': osm,
            'Peta Satelit': esriHybrid
        };

        const layerControl = L.control.layers(baseMaps).addTo(map);

        <?php foreach ($kodam as $key => $value) { ?>
            var Icon = L.icon({
                iconUrl: '<?= base_url('Gambar/Kodam/Logo/' . $value['foto']) ?>',
                iconSize: [35, 40],
            });

            L.marker([<?= $value['koordinat'] ?>], {
                    icon: Icon
                })
                .bindPopup(
                    `<div class="popup-container">
            <img src="<?= base_url('Gambar/Kodam/Logo/' . $value['foto']) ?>" class="popup-img"><br>
           <h6 class="popup-title"><?= $value['nama_kodam'] ?></h6>
            <div class="popup-content">
                <p><strong>Tanggal Didirikan:</strong> <?= $value['tgl_dibentuk'] ?></p>
                <p><strong>Wilayah:</strong> <?= $value['nama_wilayah'] ?></p>
                <p><strong>Daftar Jumlah Alutsista:</strong></p>
                <ul>
                    <li>Personel: <?= $value['jml_personel'] ?></li>
                    <li>Artileri: <?= $value['jml_artileri'] + $value['jml_artileri_2'] ?></li>
                    <li>Tank: <?= $value['jml_tank'] + $value['jml_tank_2'] ?></li>
                    <li>Helikopter: <?= $value['jml_helikopter'] + $value['jml_helikopter_2'] ?></li>
                </ul>
                <a class="btn btn-info btn-detail" href="<?= base_url('HomeKodam/DetailKodam/' . $value['id']) ?>">Detail</a>
            </div>
        </div>`
                )
                .addTo(map);
        <?php } ?>

        // ============================== LANTAMAL ==============================
        <?php foreach ($lantamal as $key => $value) { ?>
            var Icon = L.icon({
                iconUrl: '<?= base_url('Gambar/Lantamal/Logo/' . $value['foto']) ?>',
                iconSize: [40, 40],
            });

            L.marker([<?= $value['koordinat'] ?>], {
                    icon: Icon
                })
                .bindPopup(`
                    <div class="popup-container">
            <img src="<?= base_url('Gambar/Lantamal/Logo/' . $value['foto']) ?>" class="popup-img"><br>
           <h6 class="popup-title"><?= $value['nama_lantamal'] ?></h6>
           <div class="popup-content">
                <p><strong>Tanggal Didirikan:</strong> <?= $value['tgl_dibentuk'] ?></p>
                <p><strong>Wilayah:</strong> <?= $value['nama_wilayah'] ?></p>
                <p><strong>Daftar Jumlah Alutsista:</strong></p>
                <ul>
                    <li>Personel: <?= $value['jml_personel'] ?></li>
                    <li>Artileri: <?= $value['jml_artileri'] + $value['jml_artileri_2'] ?></li>
                    <li>Armada Kapal Selam: <?= $value['jml_armada_kapal_selam'] + $value['jml_armada_kapal_selam_2'] ?></li>
                    <li>Armada Kapal Permukaan: <?= $value['jml_armada_kapal_permukaan'] + $value['jml_armada_kapal_permukaan_2'] ?></li>
                </ul>
                <a class="btn btn-info btn-detail" href="<?= base_url('HomeLantamal/DetailLantamal/' . $value['id']) ?>">Detail</a>
            </div>
        </div>
        `)
                .addTo(map);
        <?php } ?>

        // ============================== KOOPSUD ==============================
        <?php foreach ($koopsud as $key => $value) { ?>
            var Icon = L.icon({
                iconUrl: '<?= base_url('Gambar/Koopsud/Logo/' . $value['foto']) ?>',
                iconSize: [35, 35],
            });

            L.marker([<?= $value['koordinat'] ?>], {
                    icon: Icon
                })
                .bindPopup(`
                <div class="popup-container">
            <img src="<?= base_url('Gambar/Koopsud/Logo/' . $value['foto']) ?>" class="popup-img"><br>
           <h6 class="popup-title"><?= $value['nama_koopsud'] ?></h6>
            <div class="popup-content">
                <p><strong>Tanggal Didirikan:</strong> <?= $value['tgl_dibentuk'] ?></p>
                <p><strong>Wilayah:</strong> <?= $value['nama_wilayah'] ?></p>
                <p><strong>Daftar Jumlah Alutsista:</strong></p>
                <ul>
                    <li>Personel: <?= $value['jml_personel'] ?></li>
                    <li>Amunisi: <?= $value['jml_amunisi'] + $value['jml_amunisi_2'] ?></li>
                    <li>Pesawat Terbang: <?= $value['jml_pesawat_terbang'] + $value['jml_pesawat_terbang_2'] ?></li>
                    <li>Pertahanan Udara: <?= $value['jml_pertahanan_udara'] + $value['jml_pertahanan_udara_2'] ?></li>
                </ul>
                <a class="btn btn-info btn-detail" href="<?= base_url('HomeKoopsud/DetailKoopsud/' . $value['id']) ?>">Detail</a>
            </div>
        </div>
        `)
                .addTo(map);
        <?php } ?>
    </script>
</body>

</html>