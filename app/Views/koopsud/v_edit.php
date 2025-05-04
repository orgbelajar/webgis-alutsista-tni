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

        <!-- Debugging -->
        <!-- <p>ID koopsud: <? //= $koopsud['id'] 
                            ?></p>
        <pre><? //php print_r($koopsud); 
                ?></pre> -->

        <?php echo form_open_multipart('Koopsud/UpdateData/' . $koopsud['id']) ?>


        <input type="hidden" name="id" value="<?= $koopsud['id'] ?>">

        <div class="row">
            <div class="col-sm-3">
                <div class="form-group">
                    <label>Nama Koopsud</label>
                    <input name="nama_koopsud" value="<?= $koopsud['nama_koopsud'] ?>" placeholder="Nama Koopsud" class="form-control" required>
                    <p class="text-danger"><?= isset($errors['nama_koopsud']) ? $errors['nama_koopsud'] : '' ?></p>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
                    <label>Tanggal Didirikan</label>
                    <input type="date" name="tgl_dibentuk" value="<?= $koopsud['tgl_dibentuk'] ?>" placeholder="Tanggal Didirikan" class="form-control" required>
                    <p class="text-danger"><?= isset($errors['tgl_dibentuk']) ? $errors['tgl_dibentuk'] : '' ?></p>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
                    <label>Wilayah Administrasi</label>
                    <select name="id_wilayah" class="form-control" required>
                        <option value="">---Pilih Wilayah Administrasi---</option>
                        <?php foreach ($wilayah as $key => $value) { ?>
                            <option value="<?= $value['id'] ?>" <?= ($value['id'] == $koopsud['id_wilayah']) ? 'selected' : '' ?>>
                                <?= $value['nama_wilayah'] ?>
                            </option>
                        <?php } ?>
                    </select>
                    <p class="text-danger"><?= isset($errors['id_wilayah']) ? $errors['id_wilayah'] : '' ?></p>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
                    <label>Koordinat Koopsud</label>
                    <input name="koordinat" id="Koordinat" value="<?= $koopsud['koordinat'] ?>" placeholder="Latitude, Longitude" class="form-control" required>
                    <p class="text-danger"><?= isset($errors['koordinat']) ? $errors['koordinat'] : '' ?></p>
                </div>
            </div>
        </div>

        <div class="form-group">
            <!-- <label>Koordinat Koopsud</label> -->
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
                            <?php if ($value['kesatuan'] == 'TNI AU') { ?>
                                <option value="<?= $value['id'] ?>" <?= $koopsud['id_kesatuan'] == $value['id'] ? 'selected' : '' ?>>
                                    <?= $value['kesatuan'] ?>
                                </option>
                            <?php } ?>
                        <?php } ?>
                    </select>
                    <p class="text-danger"><?= isset($errors['id_kesatuan']) ? $errors['id_kesatuan'] : '' ?></p>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
                    <label>Jumlah Personel</label>
                    <input type="number" name="jml_personel" value="<?= $koopsud['jml_personel'] ?>" placeholder="Masukkan Jumlah Personel" class="form-control" required>
                    <p class="text-danger"><?= isset($errors['jml_personel']) ? $errors['jml_personel'] : '' ?></p>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
                    <label>Foto Koopsud (PNG)</label>
                    <input type="file" accept=".png" name="foto" class="form-control">
                    <p class="text-danger"><?= isset($errors['foto']) ? $errors['foto'] : '' ?></p>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
                    <label>Alamat Koopsud</label>
                    <textarea name="alamat" placeholder="Masukkan Alamat Koopsud" class="form-control" required><?= $koopsud['alamat'] ?></textarea>
                    <p class="text-danger"><?= isset($errors['alamat']) ? $errors['alamat'] : '' ?></p>
                </div>
            </div>

            <!-- Amunisi 1 -->
            <div class="col-sm-3">
                <div class="form-group">
                    <label>Alutsista Amunisi 1</label>
                    <input name="nama_amunisi" value="<?= $koopsud['nama_amunisi'] ?>" placeholder="Masukkan Nama Amunisi 1" class="form-control" required>
                    <p class="text-danger"><?= isset($errors['nama_amunisi']) ? $errors['nama_amunisi'] : '' ?></p>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
                    <label>Jumlah Amunisi 1</label>
                    <input type="number" name="jml_amunisi" value="<?= $koopsud['jml_amunisi'] ?>" placeholder="Masukkan Jumlah Amunisi 1" class="form-control" required>
                    <p class="text-danger"><?= isset($errors['jml_amunisi']) ? $errors['jml_amunisi'] : '' ?></p>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
                    <label>Foto Amunisi 1 (JPG/PNG)</label>
                    <input type="file" accept=".png,.jpg,.jpeg" name="foto_amunisi" class="form-control">
                    <p class="text-danger"><?= isset($errors['foto_amunisi']) ? $errors['foto_amunisi'] : '' ?></p>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
                    <label>Deskripsi Amunisi 1</label>
                    <textarea name="deskripsi_amunisi" placeholder="Masukkan Deskripsi Amunisi 1" class="form-control" required><?= $koopsud['deskripsi_amunisi'] ?></textarea>
                    <p class="text-danger"><?= isset($errors['deskripsi_amunisi']) ? $errors['deskripsi_amunisi'] : '' ?></p>
                </div>
            </div>


            <!-- Amunisi 2 -->
            <div class="col-sm-3">
                <div class="form-group">
                    <label>Alutsista Amunisi 2</label>
                    <input name="nama_amunisi_2" value="<?= $koopsud['nama_amunisi_2'] ?>" placeholder="Masukkan Nama Amunisi 2" class="form-control" required>
                    <p class="text-danger"><?= isset($errors['nama_amunisi_2']) ? $errors['nama_amunisi_2'] : '' ?></p>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
                    <label>Jumlah Amunisi 2</label>
                    <input type="number" name="jml_amunisi_2" value="<?= $koopsud['jml_amunisi_2'] ?>" placeholder="Masukkan Jumlah Amunisi 2" class="form-control" required>
                    <p class="text-danger"><?= isset($errors['jml_amunisi_2']) ? $errors['jml_amunisi_2'] : '' ?></p>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
                    <label>Foto Amunisi 2 (JPG/PNG)</label>
                    <input type="file" accept=".png,.jpg,.jpeg" name="foto_amunisi_2" class="form-control">
                    <p class="text-danger"><?= isset($errors['foto_amunisi_2']) ? $errors['foto_amunisi_2'] : '' ?></p>
                </div>
            </div>


            <div class="col-sm-3">
                <div class="form-group">
                    <label>Deskripsi Amunisi 2</label>
                    <textarea name="deskripsi_amunisi_2" placeholder="Masukkan Deskripsi Amunisi 2" class="form-control" required><?= $koopsud['deskripsi_amunisi_2'] ?></textarea>
                    <p class="text-danger"><?= isset($errors['deskripsi_amunisi_2']) ? $errors['deskripsi_amunisi_2'] : '' ?></p>
                </div>
            </div>


            <!-- Pertahanan Udara 1 -->
            <div class="col-sm-3">
                <div class="form-group">
                    <label>Alutsista Pertahanan Udara 1</label>
                    <input name="nama_pertahanan_udara" value="<?= $koopsud['nama_pertahanan_udara'] ?>" placeholder="Masukkan Nama Pertahanan Udara 1" class="form-control" required>
                    <p class="text-danger"><?= isset($errors['nama_pertahanan_udara']) ? $errors['nama_pertahanan_udara'] : '' ?></p>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
                    <label>Jumlah Pertahanan Udara 1</label>
                    <input type="number" name="jml_pertahanan_udara" value="<?= $koopsud['jml_pertahanan_udara'] ?>" placeholder="Masukkan Jumlah Pertahanan Udara 1" class="form-control" required>
                    <p class="text-danger"><?= isset($errors['jml_pertahanan_udara']) ? $errors['jml_pertahanan_udara'] : '' ?></p>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
                    <label>Foto Pertahanan Udara 1 (JPG/PNG)</label>
                    <input type="file" accept=".png,.jpg,.jpeg" name="foto_pertahanan_udara" class="form-control">
                    <p class="text-danger"><?= isset($errors['foto_pertahanan_udara']) ? $errors['foto_pertahanan_udara'] : '' ?></p>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
                    <label>Deskripsi Pertahanan Udara 1</label>
                    <textarea name="deskripsi_pertahanan_udara" placeholder="Masukkan Deskripsi Pertahanan Udara 1" class="form-control" required><?= $koopsud['deskripsi_pertahanan_udara'] ?></textarea>
                    <p class="text-danger"><?= isset($errors['deskripsi_pertahanan_udara']) ? $errors['deskripsi_pertahanan_udara'] : '' ?></p>
                </div>
            </div>


            <!-- Pertahanan Udara 2 -->
            <div class="col-sm-3">
                <div class="form-group">
                    <label>Alutsista Pertahanan Udara 2</label>
                    <input name="nama_pertahanan_udara_2" value="<?= $koopsud['nama_pertahanan_udara_2'] ?>" placeholder="Masukkan Nama Pertahanan Udara 2" class="form-control" required>
                    <p class="text-danger"><?= isset($errors['nama_pertahanan_udara_2']) ? $errors['nama_pertahanan_udara_2'] : '' ?></p>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
                    <label>Jumlah Pertahanan Udara 2</label>
                    <input type="number" name="jml_pertahanan_udara_2" value="<?= $koopsud['jml_pertahanan_udara_2'] ?>" placeholder="Masukkan Jumlah Pertahanan Udara 2" class="form-control" required>
                    <p class="text-danger"><?= isset($errors['jml_pertahanan_udara_2']) ? $errors['jml_pertahanan_udara_2'] : '' ?></p>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
                    <label>Foto Pertahanan Udara 2 (JPG/PNG)</label>
                    <input type="file" accept=".png,.jpg,.jpeg" name="foto_pertahanan_udara_2" class="form-control">
                    <p class="text-danger"><?= isset($errors['foto_pertahanan_udara_2']) ? $errors['foto_pertahanan_udara_2'] : '' ?></p>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
                    <label>Deskripsi Pertahanan Udara 2</label>
                    <textarea name="deskripsi_pertahanan_udara_2" placeholder="Masukkan Deskripsi Pertahanan Udara 2" class="form-control" required><?= $koopsud['deskripsi_pertahanan_udara_2'] ?></textarea>
                    <p class="text-danger"><?= isset($errors['deskripsi_pertahanan_udara_2']) ? $errors['deskripsi_pertahanan_udara_2'] : '' ?></p>
                </div>
            </div>


            <!-- Pesawat Terbang 1 -->
            <div class="col-sm-3">
                <div class="form-group">
                    <label>Alutsista Pesawat Terbang 1</label>
                    <input name="nama_pesawat_terbang" value="<?= $koopsud['nama_pesawat_terbang'] ?>" placeholder="Masukkan Nama Pesawat Terbang 1" class="form-control" required>
                    <p class="text-danger"><?= isset($errors['nama_pesawat_terbang']) ? $errors['nama_pesawat_terbang'] : '' ?></p>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
                    <label>Jumlah Pesawat Terbang 1</label>
                    <input type="number" name="jml_pesawat_terbang" value="<?= $koopsud['jml_pesawat_terbang'] ?>" placeholder="Masukkan Jumlah Pesawat Terbang 1" class="form-control" required>
                    <p class="text-danger"><?= isset($errors['jml_pesawat_terbang']) ? $errors['jml_pesawat_terbang'] : '' ?></p>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
                    <label>Foto Pesawat Terbang 1 (JPG/PNG)</label>
                    <input type="file" accept=".png,.jpg,.jpeg" name="foto_pesawat_terbang" class="form-control">
                    <p class="text-danger"><?= isset($errors['foto_pesawat_terbang']) ? $errors['foto_pesawat_terbang'] : '' ?></p>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
                    <label>Deskripsi Pesawat Terbang 1</label>
                    <textarea name="deskripsi_pesawat_terbang" placeholder="Masukkan Deskripsi Pesawat Terbang 1" class="form-control" required><?= $koopsud['deskripsi_pesawat_terbang'] ?></textarea>
                    <p class="text-danger"><?= isset($errors['deskripsi_pesawat_terbang']) ? $errors['deskripsi_pesawat_terbang'] : '' ?></p>
                </div>
            </div>


            <!-- Pesawat Terbang 2 -->
            <div class="col-sm-3">
                <div class="form-group">
                    <label>Alutsista Pesawat Terbang 2</label>
                    <input name="nama_pesawat_terbang_2" value="<?= $koopsud['nama_pesawat_terbang_2'] ?>" placeholder="Masukkan Nama Pesawat Terbang 2" class="form-control" required>
                    <p class="text-danger"><?= isset($errors['nama_pesawat_terbang_2']) ? $errors['nama_pesawat_terbang_2'] : '' ?></p>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
                    <label>Jumlah Pesawat Terbang 2</label>
                    <input type="number" name="jml_pesawat_terbang_2" value="<?= $koopsud['jml_pesawat_terbang_2'] ?>" placeholder="Masukkan Jumlah Pesawat Terbang 2" class="form-control" required>
                    <p class="text-danger"><?= isset($errors['jml_pesawat_terbang_2']) ? $errors['jml_pesawat_terbang_2'] : '' ?></p>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
                    <label>Foto Pesawat Terbang 2 (JPG/PNG)</label>
                    <input type="file" accept=".png,.jpg,.jpeg" name="foto_pesawat_terbang_2" class="form-control">
                    <p class="text-danger"><?= isset($errors['foto_pesawat_terbang_2']) ? $errors['foto_pesawat_terbang_2'] : '' ?></p>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
                    <label>Deskripsi Pesawat Terbang 2</label>
                    <textarea name="deskripsi_pesawat_terbang_2" placeholder="Masukkan Deskripsi Pesawat Terbang 2" class="form-control" required><?= $koopsud['deskripsi_pesawat_terbang_2'] ?></textarea>
                    <p class="text-danger"><?= isset($errors['deskripsi_pesawat_terbang_2']) ? $errors['deskripsi_pesawat_terbang_2'] : '' ?></p>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-end mt-2">
            <button class="btn btn-primary btn-flat" type="submit">Simpan</button>
            <a href="<?= base_url('Koopsud') ?>" class="btn btn-success btn-flat ml-2">Kembali</a>
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
        center: [<?= $koopsud['koordinat'] ?>],
        zoom: [<?= $web['zoom_view'] ?>],
        layers: [osm] // default layer
    });

    const baseMaps = {
        'Peta Standar': osm,
        'Peta Satelit': esriHybrid
    };

    const layerControl = L.control.layers(baseMaps).addTo(map);

    var coordinateInput = document.querySelector("[name=koordinat]");

    var curLocation = [<?= $koopsud['koordinat'] ?>];
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