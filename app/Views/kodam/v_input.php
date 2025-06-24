<link rel="stylesheet" href="<?= base_url('css/alert.css') ?>">

<div class="col-md-12" style="margin-top: 10px;">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <p class="card-title" style="font-size: 21px;"><strong><?= $judul ?></strong></p>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <?php
            session();
            $validation = \Config\Services::validation();
            ?>

            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-error">
                    <span class="fas fa-exclamation-circle"></span>
                    <span class="msg"><?= session()->getFlashdata('error') ?></span>
                    <div class="close-btn">
                        <span class="fas fa-times"></span>
                    </div>
                </div>
            <?php endif; ?>

            <?php echo form_open_multipart('Kodam/Insert') ?>

            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Nama Kodam <span class="text-danger" data-toggle="tooltip" title="Wajib diisi">*</span></label>
                        <input name="nama_kodam" value="<?= old('nama_kodam') ?>" placeholder="Nama Kodam" class="form-control" required>
                        <p class="text-danger"><?= isset($errors['nama_kodam']) ? $errors['nama_kodam'] : '' ?></p>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Tanggal Didirikan <span class="text-danger" data-toggle="tooltip" title="Wajib diisi">*</span></label>
                        <input type="date" name="tgl_dibentuk" value="<?= old('tgl_dibentuk') ?>" placeholder="Tanggal Didirikan" class="form-control" required>
                        <p class="text-danger"><?= isset($errors['tgl_dibentuk']) ? $errors['tgl_dibentuk'] : '' ?></p>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Wilayah Administrasi <span class="text-danger" data-toggle="tooltip" title="Wajib diisi">*</span></label>
                        <select name="id_wilayah" class="form-control" required>
                            <option value="">---Pilih Wilayah Administrasi---</option>
                            <?php foreach ($wilayah as $key => $value) { ?>
                                <option value="<?= $value['id'] ?>"><?= $value['nama_wilayah'] ?></option>
                            <?php } ?>
                        </select>
                        <p class="text-danger"><?= isset($errors['id_wilayah']) ? $errors['id_wilayah'] : '' ?></p>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div id="map" style="width: 100%; height: 500px;"></div>
            </div>

            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group">
                        <label>Koordinat Kodam <span class="text-danger" data-toggle="tooltip" title="Wajib diisi">*</span></label>
                        <input name="koordinat" id="Koordinat" value="<?= old('koordinat') ?>" placeholder="Latitude, Longitude" class="form-control" required>
                        <p class="text-danger"><?= isset($errors['koordinat']) ? $errors['koordinat'] : '' ?></p>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group">
                        <label>Jumlah Personel <span class="text-danger" data-toggle="tooltip" title="Wajib diisi">*</span></label>
                        <input type="number" name="jml_personel" value="<?= old('jml_personel') ?>" placeholder="Masukkan Jumlah Personel" class="form-control" required>
                        <p class="text-danger"><?= isset($errors['jml_personel']) ? $errors['jml_personel'] : '' ?></p>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group">
                        <label>Foto Kodam (PNG) <span class="text-danger" data-toggle="tooltip" title="Wajib diisi">*</span></label>
                        <input type="file" accept=".png" name="foto" class="form-control" required>
                        <p class="text-danger"><?= isset($errors['foto']) ? $errors['foto'] : '' ?></p>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group">
                        <label>Alamat Kodam <span class="text-danger" data-toggle="tooltip" title="Wajib diisi">*</span></label>
                        <textarea name="alamat" placeholder="Masukkan Alamat Kodam" class="form-control" required><?= old('alamat') ?></textarea>
                        <p class="text-danger"><?= isset($errors['alamat']) ? $errors['alamat'] : '' ?></p>
                    </div>
                </div>

                <!-- Artileri 1 -->
                <div class="col-sm-3">
                    <div class="form-group">
                        <label>Alutsista Artileri 1</label>
                        <input name="nama_artileri" value="<?= old('nama_artileri') ?>" placeholder="Masukkan Nama Artileri 1" class="form-control">
                        <p class="text-danger"><?= isset($errors['nama_artileri']) ? $errors['nama_artileri'] : '' ?></p>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group">
                        <label>Jumlah Artileri 1</label>
                        <input type="number" name="jml_artileri" value="<?= old('jml_artileri') ?>" placeholder="Masukkan Jumlah Artileri 1" class="form-control">
                        <p class="text-danger"><?= isset($errors['jml_artileri']) ? $errors['jml_artileri'] : '' ?></p>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group">
                        <label>Foto Artileri 1 (JPG/PNG)</label>
                        <input type="file" accept=".png,.jpg,.jpeg" name="foto_artileri" class="form-control">
                        <p class="text-danger"><?= isset($errors['foto_artileri']) ? $errors['foto_artileri'] : '' ?></p>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group">
                        <label>Deskripsi Artileri 1</label>
                        <textarea name="deskripsi_artileri" placeholder="Masukkan Deskripsi Artileri 1" class="form-control"><?= old('deskripsi_artileri') ?></textarea>
                        <p class="text-danger"><?= isset($errors['deskripsi_artileri']) ? $errors['deskripsi_artileri'] : '' ?></p>
                    </div>
                </div>


                <!-- Artileri 2 -->
                <div class="col-sm-3">
                    <div class="form-group">
                        <label>Alutsista Artileri 2</label>
                        <input name="nama_artileri_2" value="<?= old('nama_artileri_2') ?>" placeholder="Masukkan Nama Artileri 2" class="form-control">
                        <p class="text-danger"><?= isset($errors['nama_artileri_2']) ? $errors['nama_artileri_2'] : '' ?></p>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group">
                        <label>Jumlah Artileri 2</label>
                        <input type="number" name="jml_artileri_2" value="<?= old('jml_artileri_2') ?>" placeholder="Masukkan Jumlah Artileri 2" class="form-control">
                        <p class="text-danger"><?= isset($errors['jml_artileri_2']) ? $errors['jml_artileri_2'] : '' ?></p>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group">
                        <label>Foto Artileri 2 (JPG/PNG)</label>
                        <input type="file" accept=".png,.jpg,.jpeg" name="foto_artileri_2" class="form-control">
                        <p class="text-danger"><?= isset($errors['foto_artileri_2']) ? $errors['foto_artileri_2'] : '' ?></p>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group">
                        <label>Deskripsi Artileri 2</label>
                        <textarea name="deskripsi_artileri_2" placeholder="Masukkan Deskripsi Artileri 2" class="form-control"><?= old('deskripsi_artileri_2') ?></textarea>
                        <p class="text-danger"><?= isset($errors['deskripsi_artileri_2']) ? $errors['deskripsi_artileri_2'] : '' ?></p>
                    </div>
                </div>


                <!-- Tank 1 -->
                <div class="col-sm-3">
                    <div class="form-group">
                        <label>Alutsista Tank 1</label>
                        <input name="nama_tank" value="<?= old('nama_tank') ?>" placeholder="Masukkan Nama Tank 1" class="form-control">
                        <p class="text-danger"><?= isset($errors['nama_tank']) ? $errors['nama_tank'] : '' ?></p>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group">
                        <label>Jumlah Tank 1</label>
                        <input type="number" name="jml_tank" value="<?= old('jml_tank') ?>" placeholder="Masukkan Jumlah Tank 1" class="form-control">
                        <p class="text-danger"><?= isset($errors['jml_tank']) ? $errors['jml_tank'] : '' ?></p>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group">
                        <label>Foto Tank 1 (JPG/PNG)</label>
                        <input type="file" accept=".png,.jpg,.jpeg" name="foto_tank" class="form-control">
                        <p class="text-danger"><?= isset($errors['foto_tank']) ? $errors['foto_tank'] : '' ?></p>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group">
                        <label>Deskripsi Tank 1</label>
                        <textarea name="deskripsi_tank" placeholder="Masukkan Deskripsi Tank 1" class="form-control"><?= old('deskripsi_tank') ?></textarea>
                        <p class="text-danger"><?= isset($errors['deskripsi_tank']) ? $errors['deskripsi_tank'] : '' ?></p>
                    </div>
                </div>

                <!-- Tank 2 -->
                <div class="col-sm-3">
                    <div class="form-group">
                        <label>Alutsista Tank 2</label>
                        <input name="nama_tank_2" value="<?= old('nama_tank_2') ?>" placeholder="Masukkan Nama Tank 2" class="form-control">
                        <p class="text-danger"><?= isset($errors['nama_tank_2']) ? $errors['nama_tank_2'] : '' ?></p>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group">
                        <label>Jumlah Tank 2</label>
                        <input type="number" name="jml_tank_2" value="<?= old('jml_tank_2') ?>" placeholder="Masukkan Jumlah Tank 2" class="form-control">
                        <p class="text-danger"><?= isset($errors['jml_tank_2']) ? $errors['jml_tank_2'] : '' ?></p>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group">
                        <label>Foto Tank 2 (JPG/PNG)</label>
                        <input type="file" accept=".png,.jpg,.jpeg" name="foto_tank_2" class="form-control">
                        <p class="text-danger"><?= isset($errors['foto_tank_2']) ? $errors['foto_tank_2'] : '' ?></p>
                    </div>
                </div>


                <div class="col-sm-3">
                    <div class="form-group">
                        <label>Deskripsi Tank 2</label>
                        <textarea name="deskripsi_tank_2" placeholder="Masukkan Deskripsi Tank 2" class="form-control"><?= old('deskripsi_tank_2') ?></textarea>
                        <p class="text-danger"><?= isset($errors['deskripsi_tank_2']) ? $errors['deskripsi_tank_2'] : '' ?></p>
                    </div>
                </div>


                <!-- Helikopter 1 -->
                <div class="col-sm-3">
                    <div class="form-group">
                        <label>Alutsista Helikopter 1</label>
                        <input name="nama_helikopter" value="<?= old('nama_helikopter') ?>" placeholder="Masukkan Nama Helikopter 1" class="form-control">
                        <p class="text-danger"><?= isset($errors['nama_helikopter']) ? $errors['nama_helikopter'] : '' ?></p>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group">
                        <label>Jumlah Helikopter 1</label>
                        <input type="number" name="jml_helikopter" value="<?= old('jml_helikopter') ?>" placeholder="Masukkan Jumlah Helikopter 1" class="form-control">
                        <p class="text-danger"><?= isset($errors['jml_helikopter']) ? $errors['jml_helikopter'] : '' ?></p>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group">
                        <label>Foto Helikopter 1 (JPG/PNG)</label>
                        <input type="file" accept=".png,.jpg,.jpeg" name="foto_helikopter" class="form-control">
                        <p class="text-danger"><?= isset($errors['foto_helikopter']) ? $errors['foto_helikopter'] : '' ?></p>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group">
                        <label>Deskripsi Helikopter 1</label>
                        <textarea name="deskripsi_helikopter" placeholder="Masukkan Deskripsi Helikopter 1" class="form-control"><?= old('deskripsi_helikopter') ?></textarea>
                        <p class="text-danger"><?= isset($errors['deskripsi_helikopter']) ? $errors['deskripsi_helikopter'] : '' ?></p>
                    </div>
                </div>

                <!-- Helikopter 2 -->
                <div class="col-sm-3">
                    <div class="form-group">
                        <label>Alutsista Helikopter 2</label>
                        <input name="nama_helikopter_2" value="<?= old('nama_helikopter_2') ?>" placeholder="Masukkan Nama Helikopter 2" class="form-control">
                        <p class="text-danger"><?= isset($errors['nama_helikopter_2']) ? $errors['nama_helikopter_2'] : '' ?></p>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group">
                        <label>Jumlah Helikopter 2</label>
                        <input type="number" name="jml_helikopter_2" value="<?= old('jml_helikopter_2') ?>" placeholder="Masukkan Jumlah Helikopter 2" class="form-control">
                        <p class="text-danger"><?= isset($errors['jml_helikopter_2']) ? $errors['jml_helikopter_2'] : '' ?></p>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group">
                        <label>Foto Helikopter 2 (JPG/PNG)</label>
                        <input type="file" accept=".png,.jpg,.jpeg" name="foto_helikopter_2" class="form-control">
                        <p class="text-danger"><?= isset($errors['foto_helikopter_2']) ? $errors['foto_helikopter_2'] : '' ?></p>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group">
                        <label>Deskripsi Helikopter 2</label>
                        <textarea name="deskripsi_helikopter_2" placeholder="Masukkan Deskripsi Helikopter 2" class="form-control"><?= old('deskripsi_helikopter_2') ?></textarea>
                        <p class="text-danger"><?= isset($errors['deskripsi_helikopter_2']) ? $errors['deskripsi_helikopter_2'] : '' ?></p>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end mt-2">
                <a href="<?= base_url('Kodam') ?>" class="btn btn-success btn-flat mr-2">Kembali</a>
                <button class="btn btn-primary btn-flat" type="submit">Simpan</button>
            </div>

            <?php echo form_close() ?>
        </div>
    </div>
</div>

<script src="<?= base_url('js/alertKodam.js') ?>"></script>

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