<div class="container mt-4">

    <!-- Foto Kodam -->
    <div class="text-center mb-4">
        <img src="<?= base_url('Gambar/Kodam/Logo/' . $kodam['foto']) ?>" alt="Foto Koopsud" class="img-fluid" style="max-height: 300px;">
    </div>

    <!-- Informasi Kodam -->
    <div class="card mb-4">
        <div class="card-body">
            <h3 class="text-center mb-4"><strong><?= $kodam['nama_kodam'] ?></strong></h3>
            <table class="table table-bordered">
                <tr>
                    <th width="200px">Kesatuan</th>
                    <td><?= $kodam['kesatuan'] ?></td>
                </tr>
                <tr>
                    <th>Tanggal Dibentuk</th>
                    <td><?= $kodam['tgl_dibentuk'] ?></td>
                </tr>
                <tr>
                    <th>Wilayah Administrasi</th>
                    <td><?= $kodam['nama_wilayah'] ?></td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td><?= $kodam['alamat'] ?></td>
                </tr>
                <tr>
                    <th>Jumlah Personel</th>
                    <td><?= $kodam['jml_personel'] ?> Personel</td>
                </tr>
            </table>
        </div>
    </div>

    <!-- Lokasi Kodam -->
    <div class="card mb-4">
        <div class="card-body">
            <h4 class="text-center mb-4"><strong>Lokasi Koordinat Kodam</strong></h4>
            <div id="map" style="height: 400px; width: 100%;"></div>
        </div>
    </div>

    <!-- Daftar Alutsista -->
    <div class="card mb-4">
        <div class="card-body">
            <h4 class="text-center mb-4"><strong>Daftar Alutsista</strong></h4>

            <!-- Tank -->
            <h5><strong>Tipe Tank</strong></h5>
            <div class="row mb-4">
                <div class="col-md-6 text-center mb-3">
                    <img src="<?= base_url('Gambar/Kodam/Tank/' . $kodam['foto_tank']) ?>" alt="Tank 1" class="img-fluid" style="max-height: 300px;">
                    <p><strong><?= $kodam['nama_tank'] ?><br>Jumlah Unit: <?= $kodam['jml_tank'] ?></strong></p>
                    <p class="mb-0" style="text-align: justify;"><?= $kodam['deskripsi_tank'] ?></p>
                </div>
                <div class="col-md-6 text-center mb-3">
                    <img src="<?= base_url('Gambar/Kodam/Tank 2/' . $kodam['foto_tank_2']) ?>" alt="Tank 2" class="img-fluid" style="max-height: 300px;">
                    <p><strong><?= $kodam['nama_tank_2'] ?><br>Jumlah Unit: <?= $kodam['jml_tank_2'] ?></strong></p>
                    <p class="mb-0" style="text-align: justify;"><?= $kodam['deskripsi_tank_2'] ?></p>
                </div>
            </div>

            <!-- Artileri -->
            <h5><strong>Tipe Artileri</strong></h5>
            <div class="row mb-4">
                <div class="col-md-6 text-center mb-3">
                    <img src="<?= base_url('Gambar/Kodam/Artileri/' . $kodam['foto_artileri']) ?>" alt="Artileri 1" class="img-fluid" style="max-height: 300px;">
                    <p><strong><?= $kodam['nama_artileri'] ?><br>Jumlah Unit: <?= $kodam['jml_artileri'] ?></strong></p>
                    <p class="mb-0" style="text-align: justify;"><?= $kodam['deskripsi_artileri'] ?></p>
                </div>
                <div class="col-md-6 text-center mb-3">
                    <img src="<?= base_url('Gambar/Kodam/Artileri 2/' . $kodam['foto_artileri_2']) ?>" alt="Artileri 2" class="img-fluid" style="max-height: 300px;">
                    <p><strong><?= $kodam['nama_artileri_2'] ?><br>Jumlah Unit: <?= $kodam['jml_artileri_2'] ?></strong></p>
                    <p class="mb-0" style="text-align: justify;"><?= $kodam['deskripsi_artileri_2'] ?></p>
                </div>
            </div>

            <!-- Helikopter -->
            <h5><strong>Tipe Helikopter</strong></h5>
            <div class="row mb-4">
                <div class="col-md-6 text-center mb-3">
                    <img src="<?= base_url('Gambar/Kodam/Helikopter/' . $kodam['foto_helikopter']) ?>" alt="Helikopter 1" class="img-fluid" style="max-height: 300px;">
                    <p><strong><?= $kodam['nama_helikopter'] ?><br>Jumlah Unit: <?= $kodam['jml_helikopter'] ?></strong></p>
                    <p class="mb-0" style="text-align: justify;"><?= $kodam['deskripsi_helikopter'] ?></p>
                </div>
                <div class="col-md-6 text-center mb-3">
                    <img src="<?= base_url('Gambar/Kodam/Helikopter 2/' . $kodam['foto_helikopter_2']) ?>" alt="Helikopter 2" class="img-fluid" style="max-height: 300px;">
                    <p><strong><?= $kodam['nama_helikopter_2'] ?><br>Jumlah Unit: <?= $kodam['jml_helikopter_2'] ?></strong></p>
                    <p class="mb-0" style="text-align: justify;"><?= $kodam['deskripsi_helikopter_2'] ?></p>
                </div>
            </div>

            <div class="d-flex justify-content-end mt-2">
                <a href="<?= session()->get('previous_url') ?? base_url() ?>" class="btn btn-success btn-flat ml-2">Kembali</a>
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
        center: [<?= $kodam['koordinat'] ?>],
        zoom: 8,
        layers: [osm] // default layer
    });

    const baseMaps = {
        'Peta Standar': osm,
        'Peta Satelit': esriHybrid
    };

    const layerControl = L.control.layers(baseMaps).addTo(map);

    var icon = L.icon({
        iconUrl: '<?= base_url('Gambar/Kodam/Logo/' . $kodam['foto']) ?>',
        iconSize: [35, 40], // size of the icon
    });
    L.marker([<?= $kodam['koordinat'] ?>], {
            icon: icon
        }).addTo(map)
        .bindPopup("<?= $kodam['koordinat'] ?>");
</script>