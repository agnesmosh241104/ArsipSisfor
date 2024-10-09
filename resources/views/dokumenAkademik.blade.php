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
    <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"></a>

            <!-- Search Form -->
            <form class="d-flex me-auto ms-3">
                <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-secondary" type="submit">
                    <i class="fa fa-search"></i>
                </button>
            </form>

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
                <li class="breadcrumb-item active" aria-current="page">Dokumen Akademik</li>
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
                <div class="card">
                    <div class="card-body text-le">
                        <img src="{{ asset('assets/img/kaiadmin/Drive.png') }}" >
                        <h5 class="card-title">Tugas Proyek Kuliah</h5>
                        <p class="card-text">Gasal 2022</p>
                    </div>
                </div>
            </div>

            <!-- Card for Skripsi -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <img src="{{ asset('assets/img/kaiadmin/Drive.png') }}" >
                        <h5 class="card-title">Skripsi</h5>
                        <p class="card-text">2020/2021</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/js/script.js') }}"></script>

</div>

@endsection
