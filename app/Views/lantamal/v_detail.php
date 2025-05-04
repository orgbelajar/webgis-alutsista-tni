<div class="container mt-4">

    <!-- Foto Lantamal -->
    <div class="text-center mb-4">
        <img src="<?= base_url('Gambar/Lantamal/Logo/' . $lantamal['foto']) ?>" alt="Foto Koopsud" class="img-fluid" style="max-height: 300px;">
    </div>

    <!-- Informasi Lantamal -->
    <div class="card mb-4">
        <div class="card-body">
            <h3 class="text-center mb-4"><strong><?= $lantamal['nama_lantamal'] ?></strong></h3>
            <table class="table table-bordered">
                <tr>
                    <th width="200px">Kesatuan</th>
                    <td><?= $lantamal['kesatuan'] ?></td>
                </tr>
                <tr>
                    <th>Tanggal Dibentuk</th>
                    <td><?= $lantamal['tgl_dibentuk'] ?></td>
                </tr>
                <tr>
                    <th>Wilayah Administrasi</th>
                    <td><?= $lantamal['nama_wilayah'] ?></td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td><?= $lantamal['alamat'] ?></td>
                </tr>
                <tr>
                    <th>Jumlah Personel</th>
                    <td><?= $lantamal['jml_personel'] ?> Personel</td>
                </tr>
            </table>
        </div>
    </div>

    <!-- Lokasi Lantamal -->
    <div class="card mb-4">
        <div class="card-body">
            <h4 class="text-center mb-4"><strong>Lokasi Koordinat Lantamal</strong></h4>
            <div id="map" style="height: 400px; width: 100%;"></div>
        </div>
    </div>

    <!-- Daftar Alutsista -->
    <div class="card mb-4">
        <div class="card-body">
            <h4 class="text-center mb-4"><strong>Daftar Alutsista</strong></h4>

            <!-- Kapal Selam -->
            <h5><strong>Tipe Armada Kapal Selam</strong></h5>
            <div class="row mb-4">
                <div class="col-md-6 text-center mb-3">
                    <img src="<?= base_url('Gambar/Lantamal/Kapal Selam/' . $lantamal['foto_armada_kapal_selam']) ?>" alt="Kapal Selam 1" class="img-fluid" style="max-height: 300px;">
                    <p><strong><?= $lantamal['nama_armada_kapal_selam'] ?><br>Jumlah Unit: <?= $lantamal['jml_armada_kapal_selam'] ?></strong></p>
                    <p class="mb-0" style="text-align: justify;"><?= $lantamal['deskripsi_armada_kapal_selam'] ?></p>
                </div>
                <div class="col-md-6 text-center mb-3">
                    <img src="<?= base_url('Gambar/Lantamal/Kapal Selam 2/' . $lantamal['foto_armada_kapal_selam_2']) ?>" alt="Kapal Selam 2" class="img-fluid" style="max-height: 300px;">
                    <p><strong><?= $lantamal['nama_armada_kapal_selam_2'] ?><br>Jumlah Unit: <?= $lantamal['jml_armada_kapal_selam_2'] ?></strong></p>
                    <p class="mb-0" style="text-align: justify;"><?= $lantamal['deskripsi_armada_kapal_selam_2'] ?></p>
                </div>
            </div>

            <!-- Artileri -->
            <h5><strong>Tipe Artileri</strong></h5>
            <div class="row mb-4">
                <div class="col-md-6 text-center mb-3">
                    <img src="<?= base_url('Gambar/Lantamal/Artileri/' . $lantamal['foto_artileri']) ?>" alt="Artileri 1" class="img-fluid" style="max-height: 300px;">
                    <p><strong><?= $lantamal['nama_artileri'] ?><br>Jumlah Unit: <?= $lantamal['jml_artileri'] ?></strong></p>
                    <p class="mb-0" style="text-align: justify;"><?= $lantamal['deskripsi_artileri'] ?></p>
                </div>
                <div class="col-md-6 text-center mb-3">
                    <img src="<?= base_url('Gambar/Lantamal/Artileri 2/' . $lantamal['foto_artileri_2']) ?>" alt="Artileri 2" class="img-fluid" style="max-height: 300px;">
                    <p><strong><?= $lantamal['nama_artileri_2'] ?><br>Jumlah Unit: <?= $lantamal['jml_artileri_2'] ?></strong></p>
                    <p class="mb-0" style="text-align: justify;"><?= $lantamal['deskripsi_artileri_2'] ?></p>
                </div>
            </div>

            <!-- Kapal Permukaan -->
            <h5><strong>Tipe Armada Kapal Permukaan</strong></h5>
            <div class="row mb-4">
                <div class="col-md-6 text-center mb-3">
                    <img src="<?= base_url('Gambar/Lantamal/Kapal Permukaan/' . $lantamal['foto_armada_kapal_permukaan']) ?>" alt="Kapal Permukaan 1" class="img-fluid" style="max-height: 300px;">
                    <p><strong><?= $lantamal['nama_armada_kapal_permukaan'] ?><br>Jumlah Unit: <?= $lantamal['jml_armada_kapal_permukaan'] ?></strong></p>
                    <p class="mb-0" style="text-align: justify;"><?= $lantamal['deskripsi_armada_kapal_permukaan'] ?></p>
                </div>
                <div class="col-md-6 text-center mb-3">
                    <img src="<?= base_url('Gambar/Lantamal/Kapal Permukaan 2/' . $lantamal['foto_armada_kapal_permukaan_2']) ?>" alt="Kapal Permukaan 2" class="img-fluid" style="max-height: 300px;">
                    <p><strong><?= $lantamal['nama_armada_kapal_permukaan_2'] ?><br>Jumlah Unit: <?= $lantamal['jml_armada_kapal_permukaan_2'] ?></strong></p>
                    <p class="mb-0" style="text-align: justify;"><?= $lantamal['deskripsi_armada_kapal_permukaan_2'] ?></p>
                </div>
            </div>

            <div class="d-flex justify-content-end mt-2">
                <a href="<?= base_url('Lantamal') ?>" class="btn btn-success btn-flat ml-2">Kembali</a>
            </div>
        </div>
    </div>
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
        center: [<?= $lantamal['koordinat'] ?>],
        zoom: 8,
        layers: [osm] // default layer
    });

    const baseMaps = {
        'Peta Standar': osm,
        'Peta Satelit': esriHybrid
    };

    const layerControl = L.control.layers(baseMaps).addTo(map);

    var icon = L.icon({
        iconUrl: '<?= base_url('Gambar/Lantamal/Logo/' . $lantamal['foto']) ?>',
        iconSize: [35, 40], // size of the icon
    });
    L.marker([<?= $lantamal['koordinat'] ?>], {
            icon: icon
        }).addTo(map)
        .bindPopup("<?= $lantamal['koordinat'] ?>");
</script>