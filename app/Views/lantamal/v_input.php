<!-- <div class="col-md-12"> -->
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">Input <?= $judul ?> dan Alutsista</h3>
        <!-- /.card-tools -->
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <?php
        session();
        $validation = \Config\Services::validation();
        ?>
        <?php echo form_open_multipart('Lantamal/InsertDataLantamal') ?>

        <div class="row">
            <div class="col-sm-3">
                <div class="form-group">
                    <label>Nama Lantamal</label>
                    <input name="nama_lantamal" value="<?= old('nama_lantamal') ?>" placeholder="Nama Lantamal" class="form-control" required>
                    <p class="text-danger"><?= isset($errors['nama_lantamal']) ? $errors['nama_lantamal'] : '' ?></p>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
                    <label>Tanggal Didirikan</label>
                    <input type="date" name="tgl_dibentuk" value="<?= old('tgl_dibentuk') ?>" placeholder="Tanggal Didirikan" class="form-control" required>
                    <p class="text-danger"><?= isset($errors['tgl_dibentuk']) ? $errors['tgl_dibentuk'] : '' ?></p>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
                    <label>Wilayah Administrasi</label>
                    <select name="id_wilayah" class="form-control" required>
                        <option value="">---Pilih Wilayah Administrasi---</option>
                        <?php foreach ($wilayah as $key => $value) { ?>
                            <option value="<?= $value['id'] ?>"><?= $value['nama_wilayah'] ?></option>
                        <?php } ?>
                    </select>
                    <p class="text-danger"><?= isset($errors['id_wilayah']) ? $errors['id_wilayah'] : '' ?></p>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
                    <label>Koordinat Lantamal</label>
                    <input name="koordinat" id="Koordinat" value="<?= old('koordinat') ?>" placeholder="Latitude, Longitude" class="form-control" required>
                    <p class="text-danger"><?= isset($errors['koordinat']) ? $errors['koordinat'] : '' ?></p>
                </div>
            </div>
        </div>

        <div class="form-group">
            <!-- <label>Koordinat Lantamal</label> -->
            <div id="map" style="width: 100%; height: 500px;"></div>
            <!-- <input name="koordinat" id="Koordinat" value="<? //= old('koordinat') 
                                                                ?>" placeholder="Latitude, Longitude" class="form-control" required> -->
        </div>

        <div class="row">
            <div class="col-sm-3">
                <div class="form-group">
                    <label>Kesatuan</label>
                    <select name="id_kesatuan" class="form-control" required>
                        <option value="">---Pilih Kesatuan---</option>
                        <?php foreach ($kesatuan as $key => $value) { ?>
                            <?php if ($value['kesatuan'] == 'TNI AL') { ?>
                                <option value="<?= $value['id'] ?>"><?= $value['kesatuan'] ?></option>
                            <?php } ?>
                        <?php } ?>
                    </select>
                    <p class="text-danger"><?= isset($errors['id_kesatuan']) ? $errors['id_kesatuan'] : '' ?></p>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
                    <label>Jumlah Personel</label>
                    <input type="number" name="jml_personel" value="<?= old('jml_personel') ?>" placeholder="Masukkan Jumlah Personel" class="form-control" required>
                    <p class="text-danger"><?= isset($errors['jml_personel']) ? $errors['jml_personel'] : '' ?></p>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
                    <label>Foto Lantamal (PNG)</label>
                    <input type="file" accept=".png" name="foto" class="form-control" required>
                    <p class="text-danger"><?= isset($errors['foto']) ? $errors['foto'] : '' ?></p>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
                    <label>Alamat Lantamal</label>
                    <textarea name="alamat" placeholder="Masukkan Alamat Lantamal" class="form-control" required><?= old('alamat') ?></textarea>
                    <p class="text-danger"><?= isset($errors['alamat']) ? $errors['alamat'] : '' ?></p>
                </div>
            </div>

            <!-- Artileri 1 -->
            <div class="col-sm-3">
                <div class="form-group">
                    <label>Alutsista Artileri 1</label>
                    <input name="nama_artileri" value="<?= old('nama_artileri') ?>" placeholder="Masukkan Nama Artileri 1" class="form-control" required>
                    <p class="text-danger"><?= isset($errors['nama_artileri']) ? $errors['nama_artileri'] : '' ?></p>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
                    <label>Jumlah Artileri 1</label>
                    <input type="number" name="jml_artileri" value="<?= old('jml_artileri') ?>" placeholder="Masukkan Jumlah Artileri 1" class="form-control" required>
                    <p class="text-danger"><?= isset($errors['jml_artileri']) ? $errors['jml_artileri'] : '' ?></p>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
                    <label>Foto Artileri 1 (JPG/PNG)</label>
                    <input type="file" accept=".png,.jpg,.jpeg" name="foto_artileri" class="form-control" required>
                    <p class="text-danger"><?= isset($errors['foto_artileri']) ? $errors['foto_artileri'] : '' ?></p>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
                    <label>Deskripsi Artileri 1</label>
                    <textarea name="deskripsi_artileri" placeholder="Masukkan Deskripsi Artileri 1" class="form-control" required><?= old('deskripsi_artileri') ?></textarea>
                    <p class="text-danger"><?= isset($errors['deskripsi_artileri']) ? $errors['deskripsi_artileri'] : '' ?></p>
                </div>
            </div>


            <!-- Artileri 2 -->
            <div class="col-sm-3">
                <div class="form-group">
                    <label>Alutsista Artileri 2</label>
                    <input name="nama_artileri_2" value="<?= old('nama_artileri_2') ?>" placeholder="Masukkan Nama Artileri 2" class="form-control" required>
                    <p class="text-danger"><?= isset($errors['nama_artileri_2']) ? $errors['nama_artileri_2'] : '' ?></p>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
                    <label>Jumlah Artileri 2</label>
                    <input type="number" name="jml_artileri_2" value="<?= old('jml_artileri_2') ?>" placeholder="Masukkan Jumlah Artileri 2" class="form-control" required>
                    <p class="text-danger"><?= isset($errors['jml_artileri_2']) ? $errors['jml_artileri_2'] : '' ?></p>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
                    <label>Foto Artileri 2 (JPG/PNG)</label>
                    <input type="file" accept=".png,.jpg,.jpeg" name="foto_artileri_2" class="form-control" required>
                    <p class="text-danger"><?= isset($errors['foto_artileri_2']) ? $errors['foto_artileri_2'] : '' ?></p>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
                    <label>Deskripsi Artileri 2</label>
                    <textarea name="deskripsi_artileri_2" placeholder="Masukkan Deskripsi Artileri 2" class="form-control" required><?= old('deskripsi_artileri_2') ?></textarea>
                    <p class="text-danger"><?= isset($errors['deskripsi_artileri_2']) ? $errors['deskripsi_artileri_2'] : '' ?></p>
                </div>
            </div>

            <!-- Kapal Selam 1 -->
            <div class="col-sm-3">
                <div class="form-group">
                    <label>Alutsista Kapal Selam 1</label>
                    <input name="nama_armada_kapal_selam" value="<?= old('nama_armada_kapal_selam') ?>" placeholder="Masukkan Nama Kapal Selam 1" class="form-control" required>
                    <p class="text-danger"><?= isset($errors['nama_armada_kapal_selam']) ? $errors['nama_armada_kapal_selam'] : '' ?></p>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
                    <label>Jumlah Kapal Selam 1</label>
                    <input type="number" name="jml_armada_kapal_selam" value="<?= old('jml_armada_kapal_selam') ?>" placeholder="Masukkan Jumlah Kapal Selam 1" class="form-control" required>
                    <p class="text-danger"><?= isset($errors['jml_armada_kapal_selam']) ? $errors['jml_armada_kapal_selam'] : '' ?></p>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
                    <label>Foto Kapal Selam 1 (JPG/PNG)</label>
                    <input type="file" accept=".png,.jpg,.jpeg" name="foto_armada_kapal_selam" class="form-control" required>
                    <p class="text-danger"><?= isset($errors['foto_armada_kapal_selam']) ? $errors['foto_armada_kapal_selam'] : '' ?></p>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
                    <label>Deskripsi Kapal Selam 1</label>
                    <textarea name="deskripsi_armada_kapal_selam" placeholder="Masukkan Deskripsi Kapal Selam 1" class="form-control" required><?= old('deskripsi_armada_kapal_selam') ?></textarea>
                    <p class="text-danger"><?= isset($errors['deskripsi_armada_kapal_selam']) ? $errors['deskripsi_armada_kapal_selam'] : '' ?></p>
                </div>
            </div>


            <!-- Kapal Selam 2 -->
            <div class="col-sm-3">
                <div class="form-group">
                    <label>Alutsista Kapal Selam 2</label>
                    <input name="nama_armada_kapal_selam_2" value="<?= old('nama_armada_kapal_selam_2') ?>" placeholder="Masukkan Nama Kapal Selam 2" class="form-control" required>
                    <p class="text-danger"><?= isset($errors['nama_armada_kapal_selam_2']) ? $errors['nama_armada_kapal_selam_2'] : '' ?></p>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
                    <label>Jumlah Kapal Selam 2</label>
                    <input type="number" name="jml_armada_kapal_selam_2" value="<?= old('jml_armada_kapal_selam_2') ?>" placeholder="Masukkan Jumlah Kapal Selam 2" class="form-control" required>
                    <p class="text-danger"><?= isset($errors['jml_armada_kapal_selam_2']) ? $errors['jml_armada_kapal_selam_2'] : '' ?></p>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
                    <label>Foto Kapal Selam 2 (JPG/PNG)</label>
                    <input type="file" accept=".png,.jpg,.jpeg" name="foto_armada_kapal_selam_2" class="form-control" required>
                    <p class="text-danger"><?= isset($errors['foto_armada_kapal_selam_2']) ? $errors['foto_armada_kapal_selam_2'] : '' ?></p>
                </div>
            </div>


            <div class="col-sm-3">
                <div class="form-group">
                    <label>Deskripsi Kapal Selam 2</label>
                    <textarea name="deskripsi_armada_kapal_selam_2" placeholder="Masukkan Deskripsi Kapal Selam 2" class="form-control" required><?= old('deskripsi_armada_kapal_selam_2') ?></textarea>
                    <p class="text-danger"><?= isset($errors['deskripsi_armada_kapal_selam_2']) ? $errors['deskripsi_armada_kapal_selam_2'] : '' ?></p>
                </div>
            </div>

            <!-- Kapal Permukaan 1 -->
            <div class="col-sm-3">
                <div class="form-group">
                    <label>Alutsista Kapal Permukaan 1</label>
                    <input name="nama_armada_kapal_permukaan" value="<?= old('nama_armada_kapal_permukaan') ?>" placeholder="Masukkan Nama Kapal Permukaan 1" class="form-control" required>
                    <p class="text-danger"><?= isset($errors['nama_armada_kapal_permukaan']) ? $errors['nama_armada_kapal_permukaan'] : '' ?></p>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
                    <label>Jumlah Kapal Permukaan 1</label>
                    <input type="number" name="jml_armada_kapal_permukaan" value="<?= old('jml_armada_kapal_permukaan') ?>" placeholder="Masukkan Jumlah Kapal Permukaan 1" class="form-control" required>
                    <p class="text-danger"><?= isset($errors['jml_armada_kapal_permukaan']) ? $errors['jml_armada_kapal_permukaan'] : '' ?></p>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
                    <label>Foto Kapal Permukaan 1 (JPG/PNG)</label>
                    <input type="file" accept=".png,.jpg,.jpeg" name="foto_armada_kapal_permukaan" class="form-control" required>
                    <p class="text-danger"><?= isset($errors['foto_armada_kapal_permukaan']) ? $errors['foto_armada_kapal_permukaan'] : '' ?></p>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
                    <label>Deskripsi Kapal Permukaan 1</label>
                    <textarea name="deskripsi_armada_kapal_permukaan" placeholder="Masukkan Deskripsi Kapal Permukaan 1" class="form-control" required><?= old('deskripsi_armada_kapal_permukaan') ?></textarea>
                    <p class="text-danger"><?= isset($errors['deskripsi_armada_kapal_permukaan']) ? $errors['deskripsi_armada_kapal_permukaan'] : '' ?></p>
                </div>
            </div>


            <!-- Kapal Permukaan 2 -->
            <div class="col-sm-3">
                <div class="form-group">
                    <label>Alutsista Kapal Permukaan 2</label>
                    <input name="nama_armada_kapal_permukaan_2" value="<?= old('nama_armada_kapal_permukaan_2') ?>" placeholder="Masukkan Nama Kapal Permukaan 2" class="form-control" required>
                    <p class="text-danger"><?= isset($errors['nama_armada_kapal_permukaan_2']) ? $errors['nama_armada_kapal_permukaan_2'] : '' ?></p>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
                    <label>Jumlah Kapal Permukaan 2</label>
                    <input type="number" name="jml_armada_kapal_permukaan_2" value="<?= old('jml_armada_kapal_permukaan_2') ?>" placeholder="Masukkan Jumlah Kapal Permukaan 2" class="form-control" required>
                    <p class="text-danger"><?= isset($errors['jml_armada_kapal_permukaan_2']) ? $errors['jml_armada_kapal_permukaan_2'] : '' ?></p>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
                    <label>Foto Kapal Permukaan 2 (JPG/PNG)</label>
                    <input type="file" accept=".png,.jpg,.jpeg" name="foto_armada_kapal_permukaan_2" class="form-control" required>
                    <p class="text-danger"><?= isset($errors['foto_armada_kapal_permukaan_2']) ? $errors['foto_armada_kapal_permukaan_2'] : '' ?></p>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
                    <label>Deskripsi Kapal Permukaan 2</label>
                    <textarea name="deskripsi_armada_kapal_permukaan_2" placeholder="Masukkan Deskripsi Kapal Permukaan 2" class="form-control" required><?= old('deskripsi_armada_kapal_permukaan_2') ?></textarea>
                    <p class="text-danger"><?= isset($errors['deskripsi_armada_kapal_permukaan_2']) ? $errors['deskripsi_armada_kapal_permukaan_2'] : '' ?></p>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-end mt-2">
            <button class="btn btn-primary btn-flat" type="submit">Simpan</button>
            <a href="<?= base_url('Lantamal') ?>" class="btn btn-success btn-flat ml-2">Kembali</a>
        </div>

        <?php echo form_close() ?>
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