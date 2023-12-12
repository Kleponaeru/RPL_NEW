<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>LUNA | Luaran Pemilik Sampah</title>
    <!-- plugins:css -->
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
                        <a class="nav-link" href="/pemilik/dashboard">
                            <span class="menu-title"><i class="bi bi-house-door-fill"></i> Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="/pemilik/lokasi-pembuangan-sampah" aria-expanded="false"
                            aria-controls="ui-basic">
                            <span class="menu-title"><i class="bi bi-geo-alt-fill"></i> Lokasi Pembuangan</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/pemilik/luaran">
                            <span class="menu-title"><i class="bi bi-layout-sidebar-inset"></i> Luaran</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/berlangganan">
                            <span class="menu-title"><i class="bi bi-star-fill"></i> Subscription</span>
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
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-md-12 grid-margin">
                            <div class="row">
                                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                                    <h3 class="font-weight-bold">Luaran Pemilik Sampah</h3>
                                    <h6 class="font-weight-normal mb-0">Kamu dapat melihat luaranmu di sini!
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="chart-container">
                                        {!! $chart->container() !!}
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <p class="card-title">Riwayat Pesananmu</p>
                                        <a class="btn btn-primary" href="/generate-pdf" role="button" type="submit">
                                            <b class="bi bi-printer-fill"> Print All</b>
                                        </a>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="table-responsive">
                                                @if (session('flash_added'))
                                                    <div class="alert alert-success alert-dismissible fade show"
                                                        role="alert" id="alert">
                                                        <strong>{{ session('flash_added') }}</strong>
                                                        <button type="button" class="close" data-dismiss="alert"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>

                                                    <!-- Automatic dismissal using JavaScript -->
                                                    <script type="text/javascript">
                                                        document.addEventListener('DOMContentLoaded', function() {
                                                            setTimeout(function() {
                                                                var alert = document.getElementById('alert');
                                                                alert.parentNode.removeChild(alert);
                                                            }, 3500);
                                                        });
                                                    </script>
                                                @elseif (session('flash_edited'))
                                                    <div class="alert alert-warning alert-dismissible fade show"
                                                        role="alert" id="alert">
                                                        <strong>{{ session('flash_edited') }}</strong>
                                                        <button type="button" class="close" data-dismiss="alert"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>

                                                    <!-- Automatic dismissal using JavaScript -->
                                                    <script type="text/javascript">
                                                        document.addEventListener('DOMContentLoaded', function() {
                                                            setTimeout(function() {
                                                                var alert = document.getElementById('alert');
                                                                alert.parentNode.removeChild(alert);
                                                            }, 3500);
                                                        });
                                                    </script>
                                                @elseif (session('flash_deleted'))
                                                    <div class="alert alert-danger alert-dismissible fade show"
                                                        role="alert" id="alert">
                                                        <strong>{{ session('flash_deleted') }}</strong>
                                                        <button type="button" class="close" data-dismiss="alert"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>

                                                    <!-- Automatic dismissal using JavaScript -->
                                                    <script type="text/javascript">
                                                        document.addEventListener('DOMContentLoaded', function() {
                                                            setTimeout(function() {
                                                                var alert = document.getElementById('alert');
                                                                alert.parentNode.removeChild(alert);
                                                            }, 3500);
                                                        });
                                                    </script>
                                                @endif

                                                @php
                                                    $grandTotal = 0;
                                                @endphp

                                                <table id="example" class="display expandable-table"
                                                    style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Bank Sampah</th>
                                                            <th>Berat</th>
                                                            <th>Pukul</th>
                                                            <th>Jenis Sampah</th>
                                                            <th>Status</th>
                                                            <th>Apakah sudah diambil?</th>
                                                            <th>Harga</th>
                                                            <th>Print</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($orders as $idx => $n)
                                                            <tr>
                                                                <th scope="row">{{ $orders->firstItem() + $idx }}
                                                                </th>
                                                                <td>{{ optional($n->location)->nama_location }}</td>
                                                                <td>{{ $n->kg_sampah }} kg</td>
                                                                <td>{{ $n->jam }} WIB</td>
                                                                <td>{{ $n->jns_smph }}</td>
                                                                <td>
                                                                    <span
                                                                        class="badge badge-{{ $n->status === 'Diterima' ? 'success' : 'warning' }}">{{ $n->status }}</span>
                                                                </td>
                                                                <td>{{ $n->pengambilan }}</td>
                                                                <td>Rp<br>{{ number_format($n->harga, 0, ',', '.') }}</td>
                                                                <td>
                                                                    <a class="btn btn-primary"
                                                                        href="/pemilik/cetak/{{ $n->id }}"
                                                                        role="button" type="submit">
                                                                        <i class="bi bi-printer-fill"></i>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                            @php
                                                                $grandTotal += $n->harga;
                                                            @endphp
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                <div>
                                                    <p>Grand Total: Rp {{ number_format($grandTotal, 0, ',', '.') }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Include the necessary scripts for the chart -->
                    <script src="{{ $chart->cdn() }}"></script>
                    {{ $chart->script() }}
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2023.
                            LUNA
                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

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
</body>

</html>
