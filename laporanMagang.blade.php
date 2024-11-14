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
{{-- <link rel="stylesheet" href="{{ asset('assets/css/kaiadmin.min.css') }}"> --}}
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

    </nav>
    <!-- Breadcrumbs -->
    <div class="container mt-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dokumen Magang dan KP</li>
            </ol>
        </nav>

        <!-- <div class="d-flex justify-content-between align-items-center mb-3">
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
       <!-- Card for Tugas Proyek Kuliah -->
<div class="col-md-4">
    <a href="#" class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#uploadModal">
        <div class="card">
            <div class="card-body text-center">
                <img src="{{ asset('assets/img/kaiadmin/Drive.png') }}" alt="Drive Icon">
                <h5 class="card-title">Tugas Proyek Kuliah</h5>
                <p class="card-text">Gasal 2022</p>
            </div>
        </div>
    </a>
</div>

<!-- Upload Modal -->
<div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="uploadModalLabel">Upload File or Folder</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('upload.file') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="fileInput" class="form-label">Select File or Folder</label>
                        <input type="file" class="form-control" id="fileInput" name="file" webkitdirectory directory multiple>
                    </div>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Optional: Bootstrap JS (Make sure Bootstrap JS is included for modal functionality) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

        <script>
            function goToNextView() {
                // Navigasi ke tampilan selanjutnya
                window.location.href = "{{ route('upload-list', ['type' => 'proyek']) }}";
            }
        </script>

        <!-- Card for Skripsi -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <img src="{{ asset('assets/img/kaiadmin/Drive.png') }}">
                    <h5 class="card-title">Skripsi</h5>
                    <p class="card-text">2020/2021</p>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="{{ asset('assets/js/script.js') }}"></script>

<!-- Core JS Files -->
<script src="{{ asset('assets/js/core/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/script.js') }}"></script> <!-- Custom JS -->

</div>

@endsection