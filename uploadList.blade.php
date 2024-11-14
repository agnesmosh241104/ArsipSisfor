@extends('layouts.app')

@section('content')

    <!-- Fonts and icons -->
    <script src="{{ asset('assets/js/plugin/webfont/webfont.min.js') }}"></script>
    <script>
      WebFont.load({
        google: { families: ["Public Sans:300,400,500,600,700"] },
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
                <img src="{{ asset('assets/img/kaiadmin/setting.png') }}" alt="" height="50" > 
            </div>

            <!-- Profile Dropdown -->
            <div class="dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                    <img src="{{ asset('assets/img/kaiadmin/Avatar.png') }}" >
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Logout</a></li>
                </ul>
            </div>
        </div>
        
    </nav>
<!-- Breadcrumbs -->
    <div class="container mt-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tugas Proyek Kuliah</li>
            </ol>
        </nav> 

        <div class="d-flex justify-content-between align-items-center mb-3">
            <!-- Create New Button with Submenu -->
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" id="createNewBtn" data-bs-toggle="dropdown" aria-expanded="false">
                    Create New
                </button>
                <ul class="dropdown-menu" aria-labelledby="createNewBtn">
                    <li><a class="dropdown-item" href="{{ route('new-folder') }}">New Folder</a></li>
                    <li><a class="dropdown-item" href="{{ route('upload-folder') }}">Upload Folder</a></li>
                    <li><a class="dropdown-item" href="{{ route('upload-file') }}">Upload File</a></li>
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
                    <img src="{{ asset('assets/img/kaiadmin/Drive.png') }}" >
                    <h5 class="card-title">Probstat</h5>
                    <p class="card-text">2022</p>
                </div>
            </div>
        </a>
    </div>

    <!-- Card for Skripsi -->
    <div class="col-md-4">
        <a href="{{ route('upload-list', ['type' => 'skripsi']) }}" class="text-decoration-none">
            <div class="card">
                <div class="card-body text-center">
                    <img src="{{ asset('assets/img/kaiadmin/Drive.png') }}" >
                    <h5 class="card-title">RPL</h5>
                    <p class="card-text">2022</p>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-4">
        <a href="{{ route('upload-list', ['type' => 'skripsi']) }}" class="text-decoration-none">
            <div class="card">
                <div class="card-body text-center">
                    <img src="{{ asset('assets/img/kaiadmin/Drive.png') }}" >
                    <h5 class="card-title">PRD</h5>
                    <p class="card-text">2022</p>
                </div>
            </div>
        </a>
    </div>

</div>   
 </div>
    <script src="{{ asset('assets/js/script.js') }}"></script>

    <!-- Core JS Files -->
    <script src="{{ asset('assets/js/core/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script> <!-- Custom JS -->

</div>

@endsection
