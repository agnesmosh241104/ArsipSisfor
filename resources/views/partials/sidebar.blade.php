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

                <!-- Upload File -->
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

