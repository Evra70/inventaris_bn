<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Aplikasi Inventaris untuk Project PAS">
    <meta name="author" content="Ephraim Jehudah Pelealu">
    <title>Inventaris - @yield('page-title')</title>
    <!-- Favicon -->
    <link href="/asset_template/img/brand/favicon.png" rel="icon" type="image/png">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Icons -->
    <link href="/asset_template/vendor/nucleo/css/nucleo.css" rel="stylesheet">
    <link href="/asset_template/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <!-- Argon CSS -->
    <link type="text/css" href="/asset_template/css/argon.css?v=1.0.0" rel="stylesheet">

    @yield('script')
</head>

<body>
<!-- Sidenav -->
<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand pt-0" href="./index.html">
            <img src="/asset_template/img/brand/blue.png" class="navbar-brand-img" alt="...">
        </a>
        <!-- User -->
        <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown">
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
              <span class="avatar avatar-sm rounded-circle">
                <img alt="Image placeholder" src="/asset_template/img/theme/team-1-800x800.jpg">
              </span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Welcome!</h6>
                    </div>
                    <div class="dropdown-divider"></div>
                    <a href="/proses_logout" class="dropdown-item">
                        <i class="ni ni-user-run"></i>
                        <span>Logout</span>
                    </a>
                </div>
            </li>
        </ul>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="/">
                            <img src="/asset_template/img/brand/blue.png">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Navigation -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/">
                        <i class="ni ni-tv-2 text-primary"></i> Home
                    </a>
                </li>
            </ul>
            @if(Auth::guard('administrator')->check())
                <hr class="my-3">
                <!-- Heading -->
                <h6 class="navbar-heading text-muted">Data User & Suplier</h6>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/menu/userList">
                            <i class="ni ni-badge text-blue"></i> Daftar User
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/menu/addUserForm">
                            <i class="ni ni-app text-blue"></i> Tambah User
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/menu/suplierList">
                            <i class="ni ni-bullet-list-67 text-blue"></i> Daftar Suplier
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/menu/addSuplierForm">
                            <i class="ni ni-box-2 text-blue"></i> Tambah Suplier
                        </a>
                    </li>
                </ul>
            @endif
            @if(Auth::guard('administrator')->check() || Auth::guard('peminjam')->check())
            <hr class="my-3">
            <!-- Heading -->
            <h6 class="navbar-heading text-muted">Entri Peminjaman Barang</h6>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/menu/peminjamanBarangList">
                        <i class="ni ni-bullet-list-67 text-blue"></i> Daftar Peminjaman Barang
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/menu/addPeminjamanBarangForm">
                        <i class="ni ni-bag-17 text-blue"></i> Peminjaman Barang
                    </a>
                </li>
            </ul>
            @endif
            @if(Auth::guard('administrator')->check() || Auth::guard('manajemen')->check())
            <hr class="my-3">
            <!-- Heading -->
            <h6 class="navbar-heading text-muted">Entri Data Barang</h6>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/menu/barangList">
                        <i class="ni ni-archive-2 text-blue"></i> Daftar Barang
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/menu/barangMasukList">
                        <i class="ni ni-bold-left text-blue"></i> Daftar Barang Masuk
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/menu/barangKeluarList">
                        <i class="ni ni-bold-right text-blue"></i> Daftar Barang Keluar
                    </a>
                </li>
            </ul>
            @endif
            @if(Auth::guard('manajemen')->check())
            <hr class="my-3">
            <!-- Heading -->
            <h6 class="navbar-heading text-muted">Generate Laporan</h6>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="menu/profile">
                        <i class="ni ni-cart text-blue"></i> Laporan Barang Masuk
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="menu/tables">
                        <i class="ni ni-curved-next text-blue"></i> Laporan Barang Keluar
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="menu/login">
                        <i class="ni ni-ruler-pencil text-blue"></i> Laporan Peminjaman Barang
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="menu/register">
                        <i class="ni ni-single-copy-04 text-blue"></i> Laporan Daftar Barang
                    </a>
                </li>
            </ul>
                @endif
        </div>
    </div>
</nav>
<!-- Main content -->
<div class="main-content">
    <!-- Top navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
        <div class="container-fluid">
            <!-- Brand -->
            <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="/">@yield('title')</a>
            <!-- User -->
            <ul class="navbar-nav align-items-center d-none d-md-flex">
                <li class="nav-item dropdown">
                    <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
                  <img alt="Image placeholder" src="/asset_template/img/theme/team-4-800x800.jpg">
                </span>
                            <div class="media-body ml-2 d-none d-lg-block">
                                <span class="mb-0 text-sm  font-weight-bold">{{Auth::user()->fullname}}</span>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                        <div class=" dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Welcome!</h6>
                        </div>
                        <div class="dropdown-divider"></div>
                        <a href="/proses_logout" class="dropdown-item">
                            <i class="ni ni-user-run"></i>
                            <span>Logout</span>
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <!-- Header -->
    @yield('header-content')
    <!-- Page content -->
    <div class="container-fluid mt--7">
        @yield('body-content')
        <!-- Footer -->
        <footer class="footer">
            <div class="row align-items-center justify-content-xl-between">
                <div class="col-xl-6">
                    <div class="copyright text-center text-xl-left text-muted">
                        &copy; 2018 <a href="#" class="font-weight-bold ml-1" target="_blank">Ephraim Jehudah</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
<!-- Argon Scripts -->
<!-- Core -->
<script src="/asset_template/vendor/jquery/dist/jquery.min.js"></script>
<script src="/asset_template/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<!-- Optional JS -->
<script src="/asset_template/vendor/chart.js/dist/Chart.min.js"></script>
<script src="/asset_template/vendor/chart.js/dist/Chart.extension.js"></script>
<!-- Argon JS -->
<script src="/asset_template/js/argon.js?v=1.0.0"></script>
</body>

</html>