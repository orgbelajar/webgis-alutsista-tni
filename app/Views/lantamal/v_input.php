<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title"><?= $judul ?></h3>
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
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Nama Lantamal</label>
                        <input name="nama_lantamal" value="<?= old('nama_lantamal') ?>" placeholder="Nama Lantamal" class="form-control" required>
                        <p class="text-danger"><?= isset($errors['nama_lantamal']) ? $errors['nama_lantamal'] : '' ?></p>
                    </div>
                </div>

                <div class="col-sm-4">
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
                        <p class="text-danger"><?= isset($errors['nama_lantamal']) ? $errors['nama_lantamal'] : '' ?></p>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Tanggal Didirikan</label>
                        <input type="date" name="tgl_dibentuk" value="<?= old('tgl_dibentuk') ?>" placeholder="Tanggal Didirikan" class="form-control" required>
                        <p class="text-danger"><?= isset($errors['nama_lantamal']) ? $errors['nama_lantamal'] : '' ?></p>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>Koordinat Lantamal</label>
                <div id="map" style="width: 100%; height: 500px;"></div>
                <input name="koordinat" id="Koordinat" value="<?= old('koordinat') ?>" placeholder="Koordinat Lantamal" class="form-control" required>
                <p class="text-danger"><?= isset($errors['nama_lantamal']) ? $errors['nama_lantamal'] : '' ?></p>
            </div>

            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Wilayah Administrasi</label>
                        <select name="id_wilayah" class="form-control" required>
                            <option value="">---Pilih Wilayah Administrasi---</option>
                            <?php foreach ($wilayah as $key => $value) { ?>
                                <option value="<?= $value['id'] ?>"><?= $value['nama_wilayah'] ?></option>
                            <?php } ?>
                        </select>
                        <p class="text-danger"><?= isset($errors['nama_lantamal']) ? $errors['nama_lantamal'] : '' ?></p>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Alamat Lantamal</label>
                        <input name="alamat" value="<?= old('alamat') ?>" placeholder="Alamat Lantamal" class="form-control" required>
                        <p class="text-danger"><?= isset($errors['nama_lantamal']) ? $errors['nama_lantamal'] : '' ?></p>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Foto Lantamal</label>
                        <input type="file" accept=".png" name="foto" value="<?= old('foto') ?> " class="form-control" required>
                        <p class="text-danger"><?= isset($errors['nama_lantamal']) ? $errors['nama_lantamal'] : '' ?></p>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Jumlah Personil</label>
                        <input type="number" name="jml_personil" value="<?= old('jml_personil') ?>" placeholder="Masukkan Jumlah Personil" class="form-control" required>
                        <p class="text-danger"><?= isset($errors['nama_lantamal']) ? $errors['nama_lantamal'] : '' ?></p>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Jumlah Kendaraan Tempur</label>
                        <input type="number" name="jml_armada_kapal_selam" value="<?= old('jml_armada_kapal_selam') ?>" placeholder="Masukkan Jumlah Kendaraan Tempur" class="form-control" required>
                        <p class="text-danger"><?= isset($errors['nama_lantamal']) ? $errors['nama_lantamal'] : '' ?></p>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Jumlah Artileri</label>
                        <input type="number" name="jml_artileri" value="<?= old('jml_artileri') ?>" placeholder="Masukkan Jumlah Artileri" class="form-control" required>
                        <p class="text-danger"><?= isset($errors['nama_lantamal']) ? $errors['nama_lantamal'] : '' ?></p>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Jumlah Helikopter</label>
                        <input type="number" name="jml_armada_kapal_permukaan" value="<?= old('jml_armada_kapal_permukaan') ?>" placeholder="Masukkan Jumlah Helikopter" class="form-control" required>
                        <p class="text-danger"><?= isset($errors['nama_lantamal']) ? $errors['nama_lantamal'] : '' ?></p>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Jumlah Pertahanan Udara</label>
                        <input type="number" name="jml_armada_kapal_patroli" value="<?= old('jml_armada_kapal_patroli') ?>" placeholder="Masukkan Jumlah Pertahanan Udara" class="form-control" required>
                        <p class="text-danger"><?= isset($errors['nama_lantamal']) ? $errors['nama_lantamal'] : '' ?></p>
                    </div>
                </div>
            </div>
            <!-- <div class="row">

      </div> -->
            <button class="btn btn-primary btn-flat" type="submit">Simpan</button>
            <a href="<?= base_url('Lantamal') ?> " class="btn btn-success btn-flat">Kembali</a>

            <?php echo form_close() ?>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            //Initialize Select2 Elements
            $('.select2').select2();

            $('#id_provinsi').change(function() {
                var id_provinsi = $('#id_provinsi').val();
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('Batalyon/Kabupaten') ?>",
                    data: {
                        id_provinsi: id_provinsi,
                    },
                    success: function(response) {
                        $('#id_kabupaten').html(response);
                    }
                });
            });

            $('#id_kabupaten').change(function() {
                var id_kabupaten = $('#id_kabupaten').val();
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('Batalyon/Kecamatan') ?>",
                    data: {
                        id_kabupaten: id_kabupaten,
                    },
                    success: function(response) {
                        $('#id_kecamatan').html(response);
                    }
                });
            });
        });
    </script>

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
            maxZoom: 19,
            attribution: esri_attribution
        });

        // Tambahan: layer untuk label jalan
        const esriLabels = L.tileLayer(esri_labels_url, {
            maxZoom: 19,
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
            $("#Koordinat").val(position.lat + "," + position.lng);
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