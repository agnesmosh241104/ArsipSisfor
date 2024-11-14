@extends('layouts.app') <!-- Pastikan layout ini ada di folder views/layouts -->

@section('content')

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

<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/plugins.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/akademik.css') }}"> <!-- Custom styles -->

<div class="main-panel">
    <!-- Topbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom custom-navbar">
        <div class="container-fluid">
            <!-- Search Form -->
            <form class="d-flex me-auto ms-3">
                <input class="form-control" type="search" placeholder="Search" aria-label="Search">
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

    <!-- Breadcrumbs -->
    <div class="container mt-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="nav-item">
                    <a href="{{ route('documents.create') }}" class="nav-link">
                        <i class="fas fa-layer-group"></i>
                        <p>Laporan Magang KP</p>
                    </a>
                </li>
                <!-- <li class="breadcrumb-item active" aria-current="page">Dokumen Akademik</li>  -->
            </ol>
        </nav>
        <div class="col-md-4">
            <a href="{{ route('upload-list', ['type' => 'proyek']) }}" class="text-decoration-none">
                <div class="card" onclick="goToNextView()">
                    <div class="card-body text-center">
                        <img src="{{ asset('assets/img/kaiadmin/Drive.png') }}" alt="Drive Icon">
                        <h5 class="card-title">Tugas Proyek Kuliah</h5>
                        <p class="card-text">Gasal 2022</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <script>
        function goToNextView() {
            // Navigasi ke tampilan selanjutnya
            window.location.href = "{{ route('upload-list', ['type' => 'proyek']) }}";
        }
    </script>
    <!-- Card for Skripsi -->
    <div class="col-md-4">
        <a href="{{ route('upload-list', ['type' => 'skripsi']) }}" class="text-decoration-none">
            <div class="card">
                <div class="card-body text-center">
                    <img src="{{ asset('assets/img/kaiadmin/Drive.png') }}">
                    <h5 class="card-title">Skripsi</h5>
                    <p class="card-text">2020/2021</p>
                </div>
            </div>
        </a>
    </div>
</div>
<!-- resources/views/documents/laporanMagang.blade.php -->
<form action="{{ route('documents.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="fitur" value="dokumenAkademik"> <!-- Sesuaikan untuk fitur dokumenAkademik atau laporanMagang -->
    <!-- Input lainnya seperti nama, tahun, dan file -->
    <button type="submit">Upload</button>
</form>

<div class="form-group">
    <label for="tahun">Tahun:</label>
    <input type="number" name="tahun" id="tahun" class="form-control" required>
</div>
<div class="form-group">
    <label for="file">File:</label>
    <input type="file" name="file" id="file" class="form-control" required>
</div>
<button type="submit" class="btn btn-success">Simpan</button>
</form>




</div>
<!-- Core JS Files -->
<script src="{{ asset('assets/js/core/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/script.js') }}"></script> <!-- Custom JS -->

</div>
@endsection