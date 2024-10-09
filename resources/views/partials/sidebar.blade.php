
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
    <link rel="stylesheet" href="{{ asset('assets/css/plugins.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/kaiadmin.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}"> <!-- Custom styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/akademik.css') }}"> <!-- Custom styles -->


<!-- Sidebar -->
<div class="sidebar" data-background-color="dark">
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
                <a href="{{ route('dokumen-akademik') }}">
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