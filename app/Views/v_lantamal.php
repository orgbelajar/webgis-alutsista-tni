<div class="col-md-12">
  <div class="card card-outline card-primary">
    <div class="card-header">
      <h3 class="card-title"><?= $judul ?></h3>




      <div class="col-md-12">
        <div id="map" style="width: 100%; height: 650px;"></div>
      </div>

      <style>
        .custom-tooltip {
          color: #0000CD !important;
          background-color: white !important;
          border: 2px solid #483D8B !important;
          font-weight: bold;
          padding: 5px;
          border-radius: 5px;
          text-align: center;
        }
      </style>



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
          layers: [osm]
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

        //Marker untuk Lantamal
        //custom marker Lantamal 1
        const marker1 = L.icon({
          iconUrl: 'http://localhost:8080/marker/Lantamal_1.png',
          iconSize: [30, 35], // size of the icon
        });
        // Tambahkan marker ke peta
        L.marker([3.784346058506001, 98.68230445464299], {
            icon: marker1
          })
          .bindPopup("Lantamal 1") // Popup saat diklik
          .bindTooltip("Lantamal 1", {
            permanent: false,
            direction: "top",
            className: "custom-tooltip" // warna custom untuk Tooltip saat hover(kursor diarahkan ke marker) 
          }) // Tooltip saat hover
          .addTo(map);


        //custom marker Lantamal 2
        const marker2 = L.icon({
          iconUrl: 'http://localhost:8080/marker/Lantamal_2.png',
          iconSize: [30, 35], // size of the icon
        });
        // Tambahkan marker ke peta
        L.marker([-1.0036208482513533, 100.36561127180553], {
            icon: marker2
          })
          .bindPopup("Lantamal 2") // Popup saat diklik
          .bindTooltip("Lantamal 2", {
            permanent: false,
            direction: "top",
            className: "custom-tooltip" // warna custom untuk Tooltip saat hover(kursor diarahkan ke marker) 
          }) // Tooltip saat hover
          .addTo(map);


        //custom marker Lantamal 3
        const marker3 = L.icon({
          iconUrl: 'http://localhost:8080/marker/Lantamal_3.png',
          iconSize: [30, 35], // size of the icon
        });
        // Tambahkan marker ke peta
        L.marker([-6.132666028988932, 106.83192833754973], {
            icon: marker3
          })
          .bindPopup("Lantamal 3") // Popup saat diklik
          .bindTooltip("Lantamal 3", {
            permanent: false,
            direction: "top",
            className: "custom-tooltip" // warna custom untuk Tooltip saat hover(kursor diarahkan ke marker) 
          }) // Tooltip saat hover
          .addTo(map);


        //custom marker Lantamal 4
        const marker4 = L.icon({
          iconUrl: 'http://localhost:8080/marker/Lantamal_4.png',
          iconSize: [30, 35], // size of the icon
        });
        // Tambahkan marker ke peta
        L.marker([1.1873389582911875, 104.02133640015913], {
            icon: marker4
          })
          .bindPopup("Lantamal 4") // Popup saat diklik
          .bindTooltip("Lantamal 4", {
            permanent: false,
            direction: "top",
            className: "custom-tooltip" // warna custom untuk Tooltip saat hover(kursor diarahkan ke marker) 
          }) // Tooltip saat hover
          .addTo(map);


        //custom marker Lantamal 5
        const marker5 = L.icon({
          iconUrl: 'http://localhost:8080/marker/Lantamal_5.png',
          iconSize: [30, 35], // size of the icon
        });
        // Tambahkan marker ke peta
        L.marker([-7.212965660286233, 112.7252977290433], {
            icon: marker5
          })
          .bindPopup("Lantamal 5") // Popup saat diklik
          .bindTooltip("Lantamal 5", {
            permanent: false,
            direction: "top",
            className: "custom-tooltip" // warna custom untuk Tooltip saat hover(kursor diarahkan ke marker) 
          }) // Tooltip saat hover
          .addTo(map);

        //custom marker Lantamal 6
        const marker6 = L.icon({
          iconUrl: 'http://localhost:8080/marker/Lantamal_6.png',
          iconSize: [30, 35], // size of the icon
        });
        // Tambahkan marker ke peta
        L.marker([-5.112279626434472, 119.41727220120914], {
            icon: marker6
          })
          .bindPopup("Lantamal 6") // Popup saat diklik
          .bindTooltip("Lantamal6", {
            permanent: false,
            direction: "top",
            className: "custom-tooltip" // warna custom untuk Tooltip saat hover(kursor diarahkan ke marker) 
          }) // Tooltip saat hover
          .addTo(map);

        //custom marker Lantamal 7
        const marker7 = L.icon({
          iconUrl: 'http://localhost:8080/marker/Lantamal_7.png',
          iconSize: [30, 35], // size of the icon
        });
        // Tambahkan marker ke peta
        L.marker([-10.215844404162885, 123.52307256887889], {
            icon: marker7
          })
          .bindPopup("Lantamal 7") // Popup saat diklik
          .bindTooltip("Lantamal 7", {
            permanent: false,
            direction: "top",
            className: "custom-tooltip" // warna custom untuk Tooltip saat hover(kursor diarahkan ke marker) 
          }) // Tooltip saat hover
          .addTo(map);

        //custom marker Lantamal 8
        const marker8 = L.icon({
          iconUrl: 'http://localhost:8080/marker/Lantamal_8.png',
          iconSize: [30, 35], // size of the icon
        });
        // Tambahkan marker ke peta
        L.marker([1.4959885244659068, 124.8773543102277], {
            icon: marker8
          })
          .bindPopup("Lantamal 8") // Popup saat diklik
          .bindTooltip("Lantamal 8", {
            permanent: false,
            direction: "top",
            className: "custom-tooltip" // warna custom untuk Tooltip saat hover(kursor diarahkan ke marker) 
          }) // Tooltip saat hover
          .addTo(map);

        //custom marker Lantamal 9
        const marker9 = L.icon({
          iconUrl: 'http://localhost:8080/marker/LANTAMAL_9.png',
          iconSize: [30, 35], // size of the icon
        });
        // Tambahkan marker ke peta
        L.marker([-3.654753945913608, 128.21727691863245], {
            icon: marker9
          })
          .bindPopup("Lantamal 9") // Popup saat diklik
          .bindTooltip("Lantamal 9", {
            permanent: false,
            direction: "top",
            className: "custom-tooltip" // warna custom untuk Tooltip saat hover(kursor diarahkan ke marker) 
          }) // Tooltip saat hover
          .addTo(map);

        //custom marker Lantamal 10
        const marker10 = L.icon({
          iconUrl: 'http://localhost:8080/marker/LANTAMAL_10.png',
          iconSize: [30, 35], // size of the icon
        });
        // Tambahkan marker ke peta
        L.marker([-2.567691992134388, 140.70982713279685], {
            icon: marker10
          })
          .bindPopup("Lantamal 10") // Popup saat diklik
          .bindTooltip("Lantamal 10", {
            permanent: false,
            direction: "top",
            className: "custom-tooltip" // warna custom untuk Tooltip saat hover(kursor diarahkan ke marker) 
          }) // Tooltip saat hover
          .addTo(map);

        //custom marker Lantamal 11
        const marker11 = L.icon({
          iconUrl: 'http://localhost:8080/marker/LANTAMAL_11.png',
          iconSize: [30, 35], // size of the icon
        });
        // Tambahkan marker ke peta
        L.marker([-8.4929291727189, 140.3727435804263], {
            icon: marker11
          })
          .bindPopup("Lantamal 11") // Popup saat diklik
          .bindTooltip("Lantamal 11", {
            permanent: false,
            direction: "top",
            className: "custom-tooltip" // warna custom untuk Tooltip saat hover(kursor diarahkan ke marker) 
          }) // Tooltip saat hover
          .addTo(map);

        //custom marker Lantamal 12
        const marker12 = L.icon({
          iconUrl: 'http://localhost:8080/marker/LANTAMAL_12.png',
          iconSize: [30, 35], // size of the icon
        });
        // Tambahkan marker ke peta
        L.marker([-0.0075209140578692425, 109.31949897423738], {
            icon: marker12
          })
          .bindPopup("Lantamal 12") // Popup saat diklik
          .bindTooltip("Lantamal 12", {
            permanent: false,
            direction: "top",
            className: "custom-tooltip" // warna custom untuk Tooltip saat hover(kursor diarahkan ke marker) 
          }) // Tooltip saat hover
          .addTo(map);

        //custom marker Lantamal 13
        const marker13 = L.icon({
          iconUrl: 'http://localhost:8080/marker/LANTAMAL_13.png',
          iconSize: [30, 35], // size of the icon
        });
        // Tambahkan marker ke peta
        L.marker([3.2643477053899703, 117.61834125644862], {
            icon: marker13
          })
          .bindPopup("Lantamal 13") // Popup saat diklik
          .bindTooltip("Lantamal 13", {
            permanent: false,
            direction: "top",
            className: "custom-tooltip" // warna custom untuk Tooltip saat hover(kursor diarahkan ke marker) 
          }) // Tooltip saat hover
          .addTo(map);

        //custom marker Lantamal 14
        const marker14 = L.icon({
          iconUrl: 'http://localhost:8080/marker/LANTAMAL_14.png',
          iconSize: [30, 35], // size of the icon
        });
        // Tambahkan marker ke peta
        L.marker([-0.8794530314473233, 131.25889551075275], {
            icon: marker14
          })
          .bindPopup("Lantamal 14") // Popup saat diklik
          .bindTooltip("Lantamal 14", {
            permanent: false,
            direction: "top",
            className: "custom-tooltip" // warna custom untuk Tooltip saat hover(kursor diarahkan ke marker) 
          }) // Tooltip saat hover
          .addTo(map);
      </script>