<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ArsipSI</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />

    <!-- Fonts and icons -->
    <script src="{{ asset('assets/js/plugin/webfont/webfont.min.js') }}"></script>
    <script>
        WebFont.load({
            google: {
                families: ["Public Sans:300,400,500,600,700"]
            },
            custom: {
                families: [
                    "Font Awesome 5 Solid",
                    "Font Awesome 5 Regular",
                    "Font Awesome 5 Brands",
                    "simple-line-icons"
                ],
                urls: ["{{ asset('assets/css/fonts.min.css') }}"]
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/plugins.min.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('assets/css/kaiadmin.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}"> <!-- Custom styles -->
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <div class="sidebar" data-background-color="light">
            <div class="sidebar-wrapper scrollbar scrollbar-inner">
                <div class="sidebar-content">
                    <ul class="nav nav-secondary">
                        <li class="nav-item active">
                            <div class="header">
                                <a href="{{ route('dashboard') }}">
                                    <img src="{{ asset('assets/img/kaiadmin/logo.jpg') }}" alt="Logo" width="80">
                                </a>
                            </div>
                            <a href="{{ route('dashboard') }}">
                                <i class="fas fa-home"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-section">
                            <h4 class="text-section">Components</h4>
                        </li>
                        <!-- Link ke halaman Dokumen Akademik -->
                        <li class="nav-item">
                            <a href="{{ route('documents.create') }}" class="nav-link">
                                <i class="fas fa-layer-group"></i>
                                <p>Dokumen Akademik</p>
                            </a>
                        </li>

                        <!-- Link ke halaman Laporan Magang -->
                        <li class="nav-item">
                            <a href="{{ route('laporan-magang') }}">
                                <i class="fas fa-layer-group"></i>
                                <p>Laporan Magang dan KP</p>
                            </a>
                        </li>
                        <!-- Link ke halaman Dokumen Kompetisi -->
                        <li class="nav-item">
                            <a href="{{ route('dokumen-kompetisi') }}">
                                <i class="fas fa-layer-group"></i>
                                <p>Dokumen Kompetisi</p>
                            </a>
                        </li>
                        <!-- Link ke halaman Dokumen Kepanitiaan -->
                        <li class="nav-item">
                            <a href="{{ route('dokumen-kepanitiaan') }}">
                                <i class="fas fa-layer-group"></i>
                                <p>Dokumen Kepanitiaan</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Main Panel -->
        <div class="main-panel">
            <!-- Topbar -->
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom custom-navbar">
                <div class="container-fluid">

                    <!-- Search Form -->
                    <form class="d-flex me-auto ms-3" style="flex-grow: 1;" method="GET" action="/search">
                        <input class="form-control" type="search" name="query" placeholder="Cari file atau folder" aria-label="Search">
                        <button class="btn btn-outline-secondary" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </form>


                    <div class="user-info">
                        <img src="{{ asset('assets/img/kaiadmin/setting.png') }}" alt="" height="50">
                    </div>

                    <!-- Profile Dropdown -->
                    <div class="dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            <img src="{{ asset('assets/img/kaiadmin/Avatar.png') }}" alt="User Avatar">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="{{ route('profile') }}">Profile</a></li>
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <!-- Form Logout -->
                            <li>
                                <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
                                    @csrf
                                    <button type="submit" class="dropdown-item" style="border: none; background: transparent; cursor: pointer;">
                                        Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- Main Content -->
            <div class="content-section">
                <h1 class="welcome-title">Selamat Datang di ArsipSI</h1>
                <p class="intro-text">
                    Platform ini dirancang untuk mempermudah pengelolaan dokumen dan artefak penting di Program Studi Sistem Informasi IT Del.
                </p>

                <div class="features-grid">
                    <div class="feature-card">
                        <div class="icon-container">
                            <i class="fas fa-folder-open"></i>
                        </div>
                        <h2>Mengelola Dokumen Penting dengan Praktis</h2>
                        <p>
                            Simpan, atur, dan akses dokumen akademik Anda di satu platform yang dirancang untuk memudahkan pengelolaan dan pencarian dokumen.
                        </p>
                    </div>
                    <div class="feature-card">
                        <div class="icon-container">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h2>Mendapatkan Keunggulan dari ArsipSI</h2>
                        <p>
                            Nikmati fitur unggulan ArsipSI yang memungkinkan semua anggota Program Studi Sistem Informasi untuk mengunggah dan mengelola dokumen dengan mudah dan aman.
                        </p>
                    </div>
                    <div class="feature-card">
                        <div class="icon-container">
                            <i class="fas fa-cogs"></i>
                        </div>
                        <h2>Mengoptimalkan Pengelolaan Arsip Akademik</h2>
                        <p>
                            Dengan ArsipSI, dosen, mahasiswa, dan staf dapat dengan cepat mengunggah, menyimpan, dan mengelola dokumen akademik, sehingga proses administrasi berjalan lebih lancar dan efisien.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Scripts -->
        <script src="{{ asset('assets/js/core/jquery-3.7.1.min.js') }}"></script>
        <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
        <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/script.js') }}"></script> <!-- Custom JS -->
        <script src="{{ asset('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugin/datatables/datatables.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
        <script src="{{ asset('assets/js/kaiadmin.min.js') }}"></script>