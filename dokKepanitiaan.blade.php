@extends('layouts.app')

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
            <form class="d-flex me-auto ms-3" action="{{ route('documents.search') }}" method="GET">
                <input
                    class="form-control"
                    type="search"
                    name="query"
                    placeholder="Search"
                    aria-label="Search"
                    value="{{ request('query') }}"
                    required>
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
    <form action="{{ route('documents.storeDokKepanitiaan') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- Form fields for uploading documents -->
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Dokumen</label>
            <input type="text" class="form-control" id="nama" name="nama" required placeholder="Enter document name">
        </div>
        <div class="mb-3">
            <label for="tahun" class="form-label">Tahun</label>
            <input type="number" class="form-control" id="tahun" name="tahun" required placeholder="Enter year">
        </div>
        <div class="mb-3">
            <label for="file" class="form-label">Upload File</label>
            <input type="file" class="form-control" id="file" name="file" required>
        </div>
        <button type="submit" class="btn btn-primary">Upload</button>
    </form>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <!-- Create New Button with Submenu -->
        <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" id="createNewBtn" data-bs-toggle="dropdown" aria-expanded="false">
                Create New
            </button>
            <ul class="dropdown-menu" aria-labelledby="createNewBtn">
                <li><a class="dropdown-item" href="{{ route('new-folder') }}">New Folder</a></li>
                <li><a class="dropdown-item" href="{{ route('upload-folder') }}">Upload Folder</a></li>
                <li><a class="dropdown-item" href="{{ route('upload-folder') }}">Upload File</a></li>
            </ul>
        </div>
    </div>

    <!-- Document Grid -->
    <div class="row">
        <!-- Card for Tugas Proyek Kuliah -->
        <div class="col-md-4">
            <a href="{{ route('upload-list', ['type' => 'proyek']) }}" class="text-decoration-none">
                <div class="card">
                    <div class="card-body text-center">
                        <img src="{{ asset('assets/img/kaiadmin/Drive.png') }}" alt="Drive Icon">
                        <h5 class="card-title">Tugas Proyek Kuliah</h5>
                        <p class="card-text">Gasal 2022</p>
                    </div>
                </div>
            </a>
        </div>
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
    <script>
        function goToNextView() {
            // Navigasi ke tampilan selanjutnya
            window.location.href = "{{ route('upload-list', ['type' => 'proyek']) }}";
        }
    </script>

</div>

<script src="{{ asset('assets/js/script.js') }}"></script>

<!-- Core JS Files -->
<script src="{{ asset('assets/js/core/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/script.js') }}"></script> <!-- Custom JS -->

@endsection