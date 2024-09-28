<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dokumen Akademik</title>
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
                    <a href="{{ route('home') }}">Dashboard</a> <!-- Halaman ini -->
                </li>
                <div class="navbar-nav">
                    <h3>Component</h3>
                    <li style="display: flex; align-items: center; margin-bottom: 10px;">
                        <img src="img/files.png" alt="files" width="30" style="margin-right: 10px;">
                        <a href="{{ route('dokumen') }}">Dokumen Akademik</a> <!-- Halaman ini -->
                </div>
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
                    <img src="img/bol.png" alt="bol" width="30" style="margin-right: 10px;">
                    <img src="img/tes.png" alt="tes" width="70" style="margin-right: 10px;">
                    <span>Hi, Alexa</span>
                </div>
            </div>

            <h2>Dokumen<img src="img/navigate.png" alt="navigate" width="70" style="margin-right: 10px;"> <img src="img/icon.png" alt="icon" width="30" style="margin-right: 10px;">Akademik</h2>
            <div style="display: flex; gap: 20px; margin-top: 20px;">
                <div style="border: 1px solid #ddd; padding: 20px; width: 200px; text-align: center;">
                <img src="img/Drive.png" alt="Drive" width="100" style="margin-right: 10px;">
                <img src="img/horizontal.png" alt="horizontal" width="100" style="margin-right: 10px;">
                


                    <h3>Tugas Kuliah</h3>
                    <p>25.5 GB</p>
                </div>
                <div style="border: 1px solid #ddd; padding: 20px; width: 200px; text-align: center;">
                     <img src="img/Drive.png" alt="Drive" width="100" style="margin-right: 10px;">
                    <h3>Skripsi</h3>
                    <p>25.5 GB</p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
