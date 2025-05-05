<div class="container mt-4">
    <!-- Foto Koopsud -->
    <div class="text-center mb-4">
        <img src="<?= base_url('Gambar/Koopsud/Logo/' . $koopsud['foto']) ?>" alt="Foto Koopsud" class="img-fluid" style="max-height: 301px;">
    </div>

    <!-- Informasi Koopsud -->
    <div class="card mb-4">
        <div class="card-body">
            <h3 class="text-center mb-4"><strong><?= $koopsud['nama_koopsud'] ?></strong></h3>
            <table class="table table-bordered">
                <tr>
                    <th width="200px">Kesatuan</th>
                    <td><?= $koopsud['kesatuan'] ?></td>
                </tr>
                <tr>
                    <th>Tanggal Dibentuk</th>
                    <td><?= $koopsud['tgl_dibentuk'] ?></td>
                </tr>
                <tr>
                    <th>Wilayah Administrasi</th>
                    <td><?= $koopsud['nama_wilayah'] ?></td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td><?= $koopsud['alamat'] ?></td>
                </tr>
                <tr>
                    <th>Jumlah Personel</th>
                    <td><?= $koopsud['jml_personel'] ?> Personel</td>
                </tr>
            </table>
        </div>
    </div>

    <!-- Lokasi Koopsud -->
    <div class="card mb-4">
        <div class="card-body">
            <h4 class="text-center mb-4"><strong>Lokasi Koordinat Koopsud</strong></h4>
            <div id="map" style="height: 400px; width: 100%;"></div>
        </div>
    </div>

    <!-- Daftar Alutsista -->
    <div class="card mb-4">
        <div class="card-body">
            <h4 class="text-center mb-4"><strong>Daftar Alutsista</strong></h4>

            <!-- Amunisi -->
            <h5><strong>Tipe Amunisi</strong></h5>
            <div class="row mb-4">
                <div class="col-md-6 text-center mb-3">
                    <img src="<?= base_url('Gambar/Koopsud/Amunisi/' . $koopsud['foto_amunisi']) ?>" alt="Amunisi 1" class="img-fluid" style="height: 350px; width: 550px;">
                    <p><strong><?= $koopsud['nama_amunisi'] ?><br>Jumlah Unit: <?= $koopsud['jml_amunisi'] ?></strong></p>
                    <p class="mb-0" style="text-align: justify;"><?= $koopsud['deskripsi_amunisi'] ?></p>
                </div>
                <div class="col-md-6 text-center mb-3">
                    <img src="<?= base_url('Gambar/Koopsud/Amunisi 2/' . $koopsud['foto_amunisi_2']) ?>" alt="Amunisi 2" class="img-fluid" style="height: 350px; width: 550px;">
                    <p><strong><?= $koopsud['nama_amunisi_2'] ?><br>Jumlah Unit: <?= $koopsud['jml_amunisi_2'] ?></strong></p>
                    <p class="mb-0" style="text-align: justify;"><?= $koopsud['deskripsi_amunisi_2'] ?></p>
                </div>
            </div>

            <!-- Pertahanan Udara -->
            <h5><strong>Tipe Pertahanan Udara</strong></h5>
            <div class="row mb-4">
                <div class="col-md-6 text-center mb-3">
                    <img src="<?= base_url('Gambar/Koopsud/Pertahanan Udara/' . $koopsud['foto_pertahanan_udara']) ?>" alt="Pertahanan Udara 1" class="img-fluid" style="height: 350px; width: 550px;">
                    <p><strong><?= $koopsud['nama_pertahanan_udara'] ?><br>Jumlah Unit: <?= $koopsud['jml_pertahanan_udara'] ?></strong></p>
                    <p class="mb-0" style="text-align: justify;"><?= $koopsud['deskripsi_pertahanan_udara'] ?></p>
                </div>
                <div class="col-md-6 text-center mb-3">
                    <img src="<?= base_url('Gambar/Koopsud/Pertahanan Udara 2/' . $koopsud['foto_pertahanan_udara_2']) ?>" alt="Pertahanan Udara 2" class="img-fluid" style="height: 350px; width: 550px;">
                    <p><strong><?= $koopsud['nama_pertahanan_udara_2'] ?><br>Jumlah Unit: <?= $koopsud['jml_pertahanan_udara_2'] ?></strong></p>
                    <p class="mb-0" style="text-align: justify;"><?= $koopsud['deskripsi_pertahanan_udara_2'] ?></p>
                </div>
            </div>

            <!-- Pesawat Terbang -->
            <h5><strong>Tipe Pesawat Terbang</strong></h5>
            <div class="row mb-4">
                <div class="col-md-6 text-center mb-3">
                    <img src="<?= base_url('Gambar/Koopsud/Pesawat Terbang/' . $koopsud['foto_pesawat_terbang']) ?>" alt="Pesawat Terbang 1" class="img-fluid" style="height: 350px; width: 550px;">
                    <p><strong><?= $koopsud['nama_pesawat_terbang'] ?><br>Jumlah Unit: <?= $koopsud['jml_pesawat_terbang'] ?></strong></p>
                    <p class="mb-0" style="text-align: justify;"><?= $koopsud['deskripsi_pesawat_terbang'] ?></p>
                </div>
                <div class="col-md-6 text-center mb-3">
                    <img src="<?= base_url('Gambar/Koopsud/Pesawat Terbang 2/' . $koopsud['foto_pesawat_terbang_2']) ?>" alt="Pesawat Terbang 2" class="img-fluid" style="height: 350px; width: 550px;">
                    <p><strong><?= $koopsud['nama_pesawat_terbang_2'] ?><br>Jumlah Unit: <?= $koopsud['jml_pesawat_terbang_2'] ?></strong></p>
                    <p class="mb-0" style="text-align: justify;"><?= $koopsud['deskripsi_pesawat_terbang_2'] ?></p>
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
        center: [<?= $koopsud['koordinat'] ?>],
        zoom: 8,
        layers: [osm] // default layer
    });

    const baseMaps = {
        'Peta Standar': osm,
        'Peta Satelit': esriHybrid
    };

    const layerControl = L.control.layers(baseMaps).addTo(map);

    var icon = L.icon({
        iconUrl: '<?= base_url('Gambar/Koopsud/Logo/' . $koopsud['foto']) ?>',
        iconSize: [35, 40], // size of the icon
    });
    L.marker([<?= $koopsud['koordinat'] ?>], {
            icon: icon
        }).addTo(map)
        .bindPopup("<?= $koopsud['koordinat'] ?>");
</script>