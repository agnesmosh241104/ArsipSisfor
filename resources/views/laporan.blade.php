<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dokumen Akademik</title>
    <link rel="stylesheet" href="{{ asset('css/get.css') }}">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style></style>
    <body>
    <div class="container-fluid">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="logo">
                <img src="img/logo.jpg" alt="logo" width="150">
            </div>
            <ul>
                <li>
                <img src="img/dasboard.png" alt="dasboard" width="30">
                    <div class="text">
                        <a href="{{ route('home') }}">Dashboard</a>
                    </div>
                </li>
                <li>
                    <img src="img/files.png" alt="files" width="30">
                    <a href="{{ route('laporan') }}">Laporan Magang dan Kerja Praktek</a>
                </li> 
            </ul>
        </div>

        <!-- Main Content -->
        <div class="card-container">
            <!-- Top Bar -->
            <div class="top-bar">
                <div class="search-bar">
                    <input type="text" placeholder="Type here to search ...">
                    <img src="img/search.png" alt="search" width="30">
                </div>
                <div class="user-info">
                    <img src="img/bol.png" alt="bol" width="30" style="margin-right: 10px;">
                    <img src="img/tes.png" alt="tes" width="40" style="margin-right: 10px;">
                    <span>Hi, Alexa</span>
                </div>
            </div>
            <div class="judul">
                <h5>Dashboard
                    <img src="img/navigate.png" alt="navigate" width="30">
                    <img src="img/icon.png" alt="icon" width="10">
                    lapooran magang Tahun 2018
                    
                </h5>
            </div> 

            <!-- Document Cards -->
            <div class="card-dokumen">
                <div class="card" style="width: 18rem;">
                <img src="img/large.png" alt="large" width="30">
                    <h3>Seminar Magang Bersertifikat_AirAsia/2018</h3>
                </div>
                <div class="card" style="width: 18rem;">
                <img src="img/large.png" alt="large" width="30">
                    <h3>Apple Developer Academy 2024</h3>
                </div>
            </div>
        </div>
    </div>
</body>

</html>