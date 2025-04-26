<div class="col-md-12">
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title"><?= $judul ?></h3>

                <div class="card-tools">
                  <a href="<?= base_url('Wilayah/Input') ?>" class="btn btn-flat btn-primary btn-sm">
                    <i class="fas fa-plus"></i> Tambah
                  </a>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?php 
                //notif insert data
                if (session()->getFlashdata('insert')) {
                echo '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i>';
                echo session()->getFlashdata('insert');
                echo '</h5></div>';
              }

               //notif update data
               if (session()->getFlashdata('update')) {
                echo '<div class="alert alert-primary alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i>';
                echo session()->getFlashdata('update');
                echo '</h5></div>';
              }

              //notif update data
              if (session()->getFlashdata('delete')) {
                echo '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i>';
                echo session()->getFlashdata('delete');
                echo '</h5></div>';
              }

                ?>
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                    <tr class= "text-center">
                        <th width="50px">No</th>
                        <th>Nama Wilayah</th>
                        <th>Warna</th>
                        <th width="100px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1;
                     foreach ($wilayah as $key => $value) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $value['nama_wilayah'] ?></td>
                            <td style="background-color: <?= $value['warna'] ?> ;"></td>
                            <td class= "text-center">
                              <a href="<?= base_url('Wilayah/Edit/'. $value['id']) ?>" class="btn btn-sm btn-warning btn-flat"><i class="fas fa-pencil-alt"></i></a>
                              <a href="<?= base_url('Wilayah/Delete/'. $value['id']) ?>" onclick="return confirm('Ingin Hapus Data..?')" class="btn btn-sm btn-danger btn-flat"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
              </table>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>

          <div class="col-md-12">
          <div id="map" style="width: 100%; height: 500px;"></div>
            </div>

          <script>
const cities = L.layerGroup();
const Jakarta = L.marker([-6.19675108223824, 106.82121845234977]).bindPopup('This is Jakarta').addTo(cities);
const Tangerang = L.marker([-6.177487755447253, 106.62778895684743]).bindPopup('This is Tangerang').addTo(cities);
const mLittleton = L.marker([39.61, -105.02]).bindPopup('This is Littleton, CO.').addTo(cities);
const mDenver = L.marker([39.74, -104.99]).bindPopup('This is Denver, CO.').addTo(cities);
const mAurora = L.marker([39.73, -104.8]).bindPopup('This is Aurora, CO.').addTo(cities);
const mGolden = L.marker([39.77, -105.23]).bindPopup('This is Golden, CO.').addTo(cities);
const osm = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
maxZoom: 19,
attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
});

const osmHOT = L.tileLayer('https://{s}.tile.openstreetmap.fr/hot/{z}/{x}/{y}.png', {
maxZoom: 19,
attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Tiles style by <a href="https://www.hotosm.org/" target="_blank">Humanitarian OpenStreetMap Team</a> hosted by <a href="https://openstreetmap.fr/" target="_blank">OpenStreetMap France</a>'
});

const map = L.map('map', {
center: [<?= $web['coordinate_wilayah'] ?>],
zoom: <?= $web['zoom_view'] ?>,
layers: [osm, cities]
});

const baseMaps = {
'OpenStreetMap': osm,
'OpenStreetMap.HOT': osmHOT
};

const overlays = {
'Cities': cities
};

const layerControl = L.control.layers(baseMaps, overlays).addTo(map);

const crownHill = L.marker([39.75, -105.09]).bindPopup('This is Crown Hill Park.');
const rubyHill = L.marker([39.68, -105.00]).bindPopup('This is Ruby Hill Park.');
const kavaleri_1 = L.marker([-6.315912188653794, 106.85422580760677]).bindPopup('This is Kavaleri_1.');
const batalyon = L.layerGroup([crownHill, rubyHill, kavaleri_1]);

const openTopoMap = L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {
maxZoom: 19,
attribution: 'Map data: &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, <a href="http://viewfinderpanoramas.org">SRTM</a> | Map style: &copy; <a href="https://opentopomap.org">OpenTopoMap</a> (<a href="https://creativecommons.org/licenses/by-sa/3.0/">CC-BY-SA</a>)'
});
layerControl.addBaseLayer(openTopoMap, 'OpenTopoMap');
layerControl.addOverlay(batalyon, 'Batalyon')

L.marker([-6.332314417444905, 106.91157486949687])
    .bindPopup("Pusinfolahta TNI")
    .addTo(map);

    <?php foreach ($wilayah as $key => $value) { ?>
        L.geoJSON(<?= $value['geojson'] ?>, {
          fillColor: '<?= $value['warna'] ?>',
          fillOpacity: 0.5,
        })
        .bindPopup("<b><?= $value['nama_wilayah'] ?></b>")
        .addTo(map);
    <?php } ?>
</script>



<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, 
      "lengthChange": false, 
      "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>