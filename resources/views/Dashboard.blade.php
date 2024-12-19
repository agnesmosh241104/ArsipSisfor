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
    <style>
        /* Sidebar styles */
        .sidebar .nav-secondary {
            list-style: none;
            padding: 0;
        }

        .sidebar .nav-secondary .nav-item {
            margin: 10px 0;
        }

        .sidebar .nav-secondary .nav-item a {
            color: #333;
            display: flex;
            align-items: center;
            padding: 10px;
            border-radius: 5px;
            transition: background 0.3s ease;
            text-decoration: none;
        }

        body {
            background-color: #f9f9f9;
        }

        .sidebar .nav-secondary .nav-item a:hover {
            background: #f1f1f1;
        }

        .sidebar .nav-secondary .nav-item a i {
            margin-right: 10px;
            font-size: 16px;
        }

        .sidebar .nav-secondary .nav-section h4 {
            font-size: 14px;
            font-weight: bold;
            color: #666;
            margin: 15px 0 10px;
        }

        /* Modal styles */
        .modal-header {
            background: #007bff;
            color: #fff;
        }

        .modal-body {
            padding: 20px;
        }

        .modal-footer {
            border-top: none;
        }
    </style>

    <div class="wrapper">
        <!-- Sidebar -->
        <div class="sidebar" data-background-color="light">
            <div class="sidebar-wrapper scrollbar scrollbar-inner">
                <div class="sidebar-content">
                    <ul class="nav nav-secondary">
                        {{-- <li class="nav-item active"> --}}
                        <div class="header">
                            {{-- <a href="{{ route('dashboard') }}"> --}}
                            <img src="{{ asset('assets/img/kaiadmin/logo.jpg') }}" alt="Logo" width="80">
                            {{-- </a> --}}
                        </div>
                        <li class="nav-item">
                            <a href="{{ route('dashboard') }}">
                                <i class="fas fa-home"></i>
                                <p>Beranda</p>
                            </a>
                        </li>

                        {{-- <a href="{{ route('dashboard') }}">
                                <i class="fas fa-home"></i>
                                <p>Beranda</p>
                            </a> --}}
                        {{-- </li>  --}}

                        <!-- Section Title -->
                        <li class="nav-section">
                            <h4 class="text-section">Manajemen File</h4>
                        </li>

                        <!-- Create New -->
                        <li class="nav-item">
                            <a href="{{ route('create-new') }}">
                                <i class="fas fa-plus-circle"></i>
                                <p>Buat folder</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('upload-file') }}">
                                <i class="fas fa-upload"></i>
                                <p>Unggah File</p>
                            </a>
                        </li>

                        <!-- Upload File -->
                        <li class="nav-item">
                            <a href="{{ route('documents.index') }}">
                                <i class="fas fa-folder"></i>
                                <p>Dokumen</p>
                            </a>
                        </li>

                        <!-- Starred -->
                        <li class="nav-item">
                            <a href="{{ route('files.starred') }}">
                                <i class="fas fa-star"></i>
                                <p>Favorit</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>


        <!-- Modals -->
        <!-- Create New Modal -->
        <div class="modal fade" id="createNewModal" tabindex="-1" role="dialog" aria-labelledby="createNewModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Create New</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('create-new') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="newItemName">Name</label>
                                <input type="text" class="form-control" id="newItemName" name="name"
                                    placeholder="Enter name" required>
                            </div>
                            <div class="form-group">
                                <label for="itemType">Type</label>
                                <select class="form-control" id="itemType" name="type">
                                    <option value="folder">Folder</option>
                                    <option value="file">File</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Upload File Modal -->
        <div class="modal fade" id="uploadFileModal" tabindex="-1" role="dialog"
            aria-labelledby="uploadFileModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Upload File</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('upload-file') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="file">Choose File</label>
                                <input type="file" class="form-control" id="file" name="file" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Upload</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script>
            // Example: Close modal after form submission
            document.querySelectorAll('.modal form').forEach(form => {
                form.addEventListener('submit', function() {
                    $(this).closest('.modal').modal('hide');
                });
            });
        </script>

        <!-- Main Panel -->
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
                <div class="container-fluid">
                    <!-- Logo di sebelah kiri -->
                    {{-- <a class="navbar-brand" href="#">
            <img src="{{ asset('path/to/logo.png') }}" alt="Logo ArsipSI" width="30" height="30" class="d-inline-block align-text-top">
            ArsipSI
        </a> --}}

                    <!-- Tombol toggler untuk mode responsif -->
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <!-- Kontainer isi navbar -->
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Element di kanan -->
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <!-- Gambar Profile -->
                                    <img src="{{ Auth::user()->photo ? asset('storage/' . Auth::user()->photo) : asset('assets/img/kaiadmin/Avatar.png') }}"
                                        alt="User Avatar" class="rounded-circle" width="40" height="40"
                                        style="object-fit: cover;">
                                </a>
                                <!-- Dropdown Menu -->
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="{{ route('profile') }}">Profile</a></li>
                                    {{-- <li><a class="dropdown-item" href="#">Settings</a></li> --}}
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                        <form action="{{ route('logout') }}" method="POST">
                                            @csrf
                                            <button type="submit" class="dropdown-item text-danger">Logout</button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>


            <!-- Main Content -->
            <div class="content-section">
                <h1 class="welcome-title">Selamat Datang {{ Auth::user()->name }} di ArsipSI</h1>
                <p class="intro-text">
                    Platform ini dirancang untuk mempermudah pengelolaan dokumen dan artefak penting di Program Studi
                    Sistem Informasi IT Del.
                </p>

                <div class="features-grid">
                    <div class="feature-card">
                        <div class="icon-container">
                            <i class="fas fa-folder-open"></i>
                        </div>
                        <h2>Mengelola Dokumen Penting dengan Praktis</h2>
                        <p>
                            Simpan, atur, dan akses dokumen akademik Anda di satu platform yang dirancang untuk
                            memudahkan pengelolaan dan pencarian dokumen.
                        </p>
                    </div>
                    <div class="feature-card">
                        <div class="icon-container">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h2>Mendapatkan Keunggulan dari ArsipSI</h2>
                        <p>
                            Nikmati fitur unggulan ArsipSI yang memungkinkan semua anggota Program Studi Sistem
                            Informasi untuk mengunggah dan mengelola dokumen dengan mudah dan aman.
                        </p>
                    </div>
                    <div class="feature-card">
                        <div class="icon-container">
                            <i class="fas fa-cogs"></i>
                        </div>
                        <h2>Mengoptimalkan Pengelolaan Arsip Akademik</h2>
                        <p>
                            Dengan ArsipSI, dosen, mahasiswa, dan staf dapat dengan cepat mengunggah, menyimpan, dan
                            mengelola dokumen akademik, sehingga proses administrasi berjalan lebih lancar dan efisien.
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
