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

            <div class="form-container">
            
            <a href="{{ route('manage') }}">Manages Contact</a>
    
    <div class="form-content">
        <div class="profile">
        <img src="img/brn.png" alt="brn" width="30">
        </div>
        <div class="details">
            <form>
                <label for="firstName">First Name:</label>
                <input type="text" id="firstName" name="firstName" value="Bronson">

                <label for="lastName">Last Name:</label>
                <input type="text" id="lastName" name="lastName" value="Siallagan">

                <label for="username">User Name:</label>
                <input type="text" id="username" name="username" value="Bronson@025">

                <label>Gender:</label>
                <label for="male">Male</label>
                <input type="radio" id="male" name="gender" value="male">
                <label for="female">Female</label>
                <input type="radio" id="female" name="gender" value="female">

                <label for="city">City:</label>
                <input type="text" id="city" name="city" value="Toba Samosir">

                <label for="dob">Date of Birth:</label>
                <input type="date" id="dob" name="dob" value="2003-12-16">

                <label for="address">Address:</label>
                <textarea id="address" name="address">Jalan Permata Samosir no 33</textarea>

                <div class="buttons">
                    <button type="submit">Submit</button>
                    <button type="button" class="cancel" onclick="window.location.href='index.html'">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>