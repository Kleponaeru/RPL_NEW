<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LUNA | Titik Jemput</title>
    <!-- Add Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <style>
        #map {
            height: 600px;
            width: 100%;
        }

        #pickUpLists {
            margin-top: 20px;
        }

        #validPickUps,
        #invalidPickUps {
            list-style-type: none;
            padding: 0;
        }

        #validPickUps li,
        #invalidPickUps li {
            cursor: pointer;
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
            transition: background-color 0.3s ease;
            /* Add transition for a smoother effect */
        }

        #validPickUps li:hover,
        #invalidPickUps li:hover {
            background-color: #f0f0f0;
            /* Change the background color on hover */
        }
    </style>


    <link rel="stylesheet" href="vendors/feather/feather.css">
    <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Bootstrap Font Icon CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="js/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    {{-- <link rel="stylesheet" href="vertical-layout-light/style_dash.css"> --}}
    <link rel="stylesheet" href="{{ asset('style_dash.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="images/favicon.png" />
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    <!-- plugins:js -->
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->

    <!-- Plugin js for this page -->
    <script src="vendors/chart.js/Chart.min.js"></script>
    <script src="vendors/datatables.net/jquery.dataTables.js"></script>
    <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
    <script src="js/dataTables.select.min.js"></script>

    <!-- End plugin js for this page -->

    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/hoverable-collapse.js"></script>
    <script src="js/template.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/todolist.js"></script>
    <!-- endinject -->

    <!-- Custom js for this page-->
    <script src="js/dashboard.js"></script>
    <script src="js/Chart.roundedBarCharts.js"></script>
    <!-- End custom js for this page-->
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo mr-5" href="/pemilik/dashboard"><img
                        src="{{ asset('images/luna-icon.svg') }}" /></a>
                <a class="navbar-brand brand-logo-mini" href="/pemilik/dashboard"><img src="images/logo-mini.svg"
                        alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="icon-menu"></span>
                </button>
                <a class="btn btn-primary" href="/pemilik/profile" role="button"><i
                        class="bi bi-person-circle"></i></a>


            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/pengambil/dashboard">
                            <span class="menu-title"><i class="bi bi-house-door-fill"></i> Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="/pengambil/titik-jemput" aria-expanded="false"
                            aria-controls="ui-basic">
                            <span class="menu-title"><i class="bi bi-geo-alt-fill"></i> Titik Jemput</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/pengambil/luaran">
                            <span class="menu-title"><i class="bi bi-layout-sidebar-inset"></i> Luaran</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="dropdown-item border-top" href="/logout"><i class="bi bi-box-arrow-right"></i>
                            Logout</a>
                        <i class="icon-paper menu-icon"></i>
                        </button>
                    </li>
                </ul>
            </nav>
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-md-12 grid-margin">
                            <div class="row">
                                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                                    <div class="card">
                                        <div class="card-body">
                                            <h2 class="card-title">Masih Berlangganan (Valid)</h2>
                                            <form id="validPickUpsForm">
                                                <div class="form-group">
                                                    <ul id="validPickUps" class="list-group"></ul>
                                                </div>
                                            </form>

                                            <h2 class="card-title">Sudah Tidak Berlangganan (Tidak Valid)</h2>
                                            <form id="invalidPickUpsForm">
                                                <div class="form-group">
                                                    <ul id="invalidPickUps" class="list-group"></ul>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                    <div id="map"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
        var map = L.map('map').setView([0, 0], 30);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        navigator.geolocation.getCurrentPosition(function(position) {
            var lat = position.coords.latitude;
            var lon = position.coords.longitude;
            map.setView([lat, lon], 18);
            var userLocation = L.marker([lat, lon]).addTo(map);
            userLocation.bindPopup('You are here!').openPopup();
        });

        var locations = <?php echo json_encode($locations); ?>;
        var validLocationIds = [1, 3]; // Masukkin id_location valid di sini
        var validPickUpsList = document.getElementById('validPickUps');
        var invalidPickUpsList = document.getElementById('invalidPickUps');

        locations.forEach(function(location) {
            var pickUpList = validLocationIds.includes(location.id_location) ? validPickUpsList :
                invalidPickUpsList;

            var listItem = document.createElement('li');
            listItem.innerHTML = '<strong>' + location.alamat + '</strong><br>' +
                'Latitude: ' + location.latitude_alamat + '<br>Longitude: ' + location.longtitude_alamat;

            listItem.addEventListener('click', function() {
                map.setView([location.latitude_alamat, location.longtitude_alamat], 18);
            });

            pickUpList.appendChild(listItem);

            L.marker([location.latitude_alamat, location.longtitude_alamat])
                .addTo(map)
                .bindPopup('<strong>' + location.alamat + '</strong><br>' +
                    'Latitude: ' + location.latitude_alamat + '<br>Longitude: ' + location.longtitude_alamat)
                .openPopup().on('click', function() {
                    window.location.href = '/' + location.alamat;
                });
        });
    </script>
</body>

</html>
