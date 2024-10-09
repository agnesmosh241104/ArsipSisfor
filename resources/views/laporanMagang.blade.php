@extends('layouts.app')

@section('content')

<div class="main-panel">
    <!-- Topbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                {{-- <img src="{{ asset('assets/img/kaiadmin/logo.jpg') }}" alt="Logo" height="30"> --}}
            </a>

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
                    <img src="{{ asset('assets/img/kaiadmin/profil.png') }}" >
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
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dokumen Akademik</li>
            </ol>
        </nav>

        <div class="container">
            <h2>Dokumen Akademik</h2>
    
        <!-- Profile Dropdown -->
            <div class="dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                    {{-- <img src="{{ asset('assets/img/kaiadmin/profil.png') }}" class="avatar-img rounded-circle" > --}}
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="#">New Folder</a></li>
                    <li><a class="dropdown-item" href="#">Upload File</a></li>
                    <li><a class="dropdown-item" href="#">Upload Folder</a></li>
                </ul>
            </div>
        </div>
    </nav>
                         

        <!-- Document Grid -->
        <div class="row">
            <!-- Card for Tugas Proyek Kuliah -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
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
</div>

<script src="{{ asset('assets/js/script.js') }}"></script>

@endsection
