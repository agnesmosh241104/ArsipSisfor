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
    <h1>Documents List</h1>
    <a href="{{ route('documents.create') }}" class="btn btn-primary"></a>

    
    <tbody>
        @foreach ($documents as $document)
        <tr>
            <td>{{ $document->nama }}</td>
            <td>{{ $document->tahun }}</td>
            <td>
                <a href="{{ asset('storage/' . $document->file_path) }}" target="_blank">Lihat File</a>
            </td>
        </tr>

        <div class="card" style="width: 18rem;">
            <h3>{{ $document->nama }}</h3>
            <img src="{{ asset('assets/img/kaiadmin/Drive.png') }}" alt="Drive Icon" width="100px">
            <div class="card-body">
                <p class="card-text">{{ $document->tahun }}</p>
            </div>
        </div>
        @endforeach
    </tbody>
    </table>
    @endsection