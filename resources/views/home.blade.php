<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ArsipSI</title>

    <!-- Fonts google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="header">
                <a href="">
                    <img src="img/logo.jpg" alt="Logo" width="80">
                </a>
            </div>
            <div class="main">
                <div class="list-item">
                    <a href="">
                        <img src="img/dasboard.png" alt="" width="18">
                        <span class="description">Dashboard</span>
                        
                    </a>
                </div>
                <div class="list-item">
                    <a href="">
                        <img src="img/akademik.png" alt="" class="icon" width="18">
                        <span class="description">Dokumen Akademik</span>
                    </a>
                </div>
                <div class="list-item">
                    <a href="">
                        <img src="img/Magang.png" alt="" class="icon" width="18">
                        <span class="description">Laporan Magang dan KP</span>
                    </a>
                </div>
                <div class="list-item">
                    <a href="">
                        <img src="img/kompetisi.png" alt="" class="icon" width="18">
                        <span class="description">Dokumen Kompetisi</span>
                    </a>
                </div>
                <div class="list-item">
                    <a href="">
                        <img src="img/organisasi.png" alt="" class="icon" width="18">
                        <span class="description">Dokumen Kepanitiaan dan Organisasi</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Main content with Top Navbar -->
        <div class="main-content">
            <div class="top-bar">
                <div class="search-bar">
                    <input type="text" placeholder="Type here to search...">
                    <img src="img/search.png" alt="" width="20">
                </div>
                <div class="user-info">
                    <img src="img/setting.png" alt="settings" width="44" style="margin-right: 10px;">
                    <img src="img/profil.png" alt="profile" width="30" style="margin-right: 10px;">
                    <span>Hi, Alexa</span>
                </div>
            </div>

            <div class="content-section">
                <h1 class="welcome-title">Selamat Datang di ArsipSI</h1>
                <p class="intro-text">
                    Platform ini dirancang untuk mempermudah pengelolaan dokumen dan artefak penting di Program Studi Sistem Informasi IT Del.
                </p>
                
                <div class="features-grid">
                    <div class="feature-card">
                        <div class="card-number">1</div> <!-- Penomoran -->
                        <div class="icon-container">
                            <i class="fas fa-folder-open"></i>
                        </div>
                        <h2>Mengelola Dokumen Penting dengan Praktis</h2>
                        <p>
                            Simpan, atur, dan akses dokumen akademik Anda di satu platform yang dirancang untuk memudahkan pengelolaan dan pencarian dokumen.
                        </p>
                    </div>
                    <div class="feature-card">
                        <div class="card-number">2</div> <!-- Penomoran -->
                        <div class="icon-container">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h2>Mendapatkan Keunggulan dari ArsipSI</h2>
                        <p>
                            Nikmati fitur unggulan ArsipSI yang memungkinkan semua anggota Program Studi Sistem Informasi untuk mengunggah dan mengelola dokumen dengan mudah dan aman.
                        </p>
                    </div>
                    <div class="feature-card">
                        <div class="card-number">3</div> <!-- Penomoran -->
                        <div class="icon-container">
                            <i class="fas fa-cogs"></i>
                        </div>
                        <h2>Mengoptimalkan Pengelolaan Arsip Akademik</h2>
                        <p>
                            Dengan ArsipSI, dosen, mahasiswa, dan staf dapat dengan cepat mengunggah, menyimpan, dan mengelola dokumen akademik, sehingga proses administrasi berjalan lebih lancar dan efisien.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
