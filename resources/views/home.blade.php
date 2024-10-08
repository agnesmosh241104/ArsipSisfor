<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ArsipSI</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="logo">
                <img src="img/logo.jpg" alt="logo" width="200">
            </div>
            <ul>
                <li>
                    <img src="img/dasboard.png" alt="dashboard" width="30">
                    <a href="{{ route('home') }}">Dashboard</a>
                </li>
                <h3>Component</h3>
                <li>
                    <img src="img/files.png" alt="files" width="30">
                    <a href="{{ route('dokumen') }}">Dokumen Akademik</a>
                </li>
                <li>
                    <img src="img/files.png" alt="files" width="30">
                    <a href="{{ route('laporan') }}">Laporan Magang dan Kerja Praktek</a>
                </li>
                <li>
                    <img src="img/files.png" alt="files" width="30">
                    <a href="{{ route('kompetisi') }}">Dokumen Kompetisi</a>
                </li>
                <li>
                <img src="img/files.png" alt="files" width="30">
                <a href="{{ route('kepanitiaan') }}">Dokumen Kepanitiaan Organisasi</a>
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <div class="top-bar">
                <div class="search-bar">
                    <input type="text" placeholder="Type here to search ......">
                    <img src="img/search.png" alt="search" width="40">
                </div>
                <div class="user-info">
                    <img src="img/bol.png" alt="user icon" width="30">
                    
                    <img src="img/tes.png" alt="profile" width="70">

                    <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">Logout</button>
                    
                    </form>
                    <span>Hi, Alexa</span>
                </div>
            </div>
            <h1>Selamat Datang di Arsip SI</h1>
            <p>Platform ini dirancang untuk mempermudah pengelolaan dokumen dan artefak penting di Program Studi Sistem Informasi IT Del.</p>
            <h2>Mengelola Dokumen Penting dengan Praktis</h2>
            <p>Simpan, atur, dan akses dokumen akademik Anda di satu platform yang dirancang untuk memudahkan pengelolaan dan pencarian dokumen.</p>
            <h2>Mendapatkan Keunggulan dari ArsipSI</h2>
            <p>Nikmati fitur unggulan ArsipSI yang memungkinkan semua anggota Program Studi Sistem Informasi untuk mengunggah dan mengelola dokumen dengan mudah dan aman.</p>
            <h2>Mengoptimalkan Pengelolaan Arsip Akademik</h2>
            <p>Dengan ArsipSI, dosen, mahasiswa, dan staf dapat dengan cepat mengunggah, menyimpan, dan mengelola dokumen akademik, sehingga proses administrasi berjalan lebih lancar dan efisien.</p>
        </div>
    </div>
</body>
</html>
