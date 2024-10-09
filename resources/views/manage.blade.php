<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ArsipSI</title>
    <link rel="stylesheet" href="{{ asset('css/manage.css') }}">
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
        
        <div class="main">
            <!-- Tabs for Personal Info and Manage Contact -->
            <div class="tabs">
                <button class="tab-button active">Personal Information</button>
                <button class="tab-button">Manage Contact</button>
            </div>

            <!-- Manage Contact Form -->
            <div class="form-container">
                <form>
                    <label for="contact-number">Contact Number:</label>
                    <input type="text" id="contact-number" name="contact-number" placeholder="085346562412"><br><br>
                    
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" placeholder="Bronson123@gmail.com"><br><br>
                    
                    <label for="url">Url:</label>
                    <input type="url" id="url" name="url" placeholder="https://bronson.profile.com"><br><br>
                    
                    <input type="submit" value="Submit">
                    <button type="button" class="cancel-button">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
