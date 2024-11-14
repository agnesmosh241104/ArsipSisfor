 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    <title>ArsipSI</title>
    <style>
        .form-container {
            max-width: 600px;
            margin: 20px auto;
            padding: 30px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.15);
            background-color: #fff;
        }
        .form-container h3 {
            text-align: center;
            font-size: 24px;
            font-weight: 600;
            color: #333;
            margin-bottom: 25px;
        }
        .form-container .form-group {
            margin-bottom: 20px;
        }
        .form-container .form-label {
            font-weight: 500;
            color: #555;
            margin-bottom: 8px;
            display: inline-block;
        }
        .form-container .form-control {
            border-radius: 6px;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ced4da;
        }
        .d-flex.justify-content-center .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .d-flex.justify-content-center .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }
        .tab-content {
            display: none; /* Hide all tab content by default */
        }
        .tab-content.active {
            display: block; /* Show active tab content */
        }
        @media (max-width: 768px) {
            .form-container {
                max-width: 90%;
                padding: 20px;
            }
            .form-container h3 {
                font-size: 20px;
            }
        }
    </style>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
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
    <link rel="stylesheet" href="{{ asset('assets/css/kaiadmin.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <div class="sidebar" data-background-color="light">
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
                        <li class="nav-item">
                            <a href="{{ route('dokumen-akademik') }}">
                                <i class="fas fa-layer-group"></i>
                                <p>Dokumen Akademik</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('laporan-magang') }}">
                                <i class="fas fa-layer-group"></i>
                                <p>Laporan Magang dan KP</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dokumen-kompetisi') }}">
                                <i class="fas fa-layer-group"></i>
                                <p>Dokumen Kompetisi</p>
                            </a>
                        </li>
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
          <!-- Main Panel -->
          <div class="main-panel">
    <!-- Topbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom custom-navbar">
        <div class="container-fluid">

            <!-- Search Form -->
            <form class="d-flex me-auto ms-3" style="flex-grow: 1;">
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
                    <li><hr class="dropdown-divider"></li>
                    <!-- Form Logout -->
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

        <!-- Main Content -->
        <div class="main-content container">
            <!-- Tab Navigation -->
            <div class="d-flex justify-content-center mt-4">
            </div>

            <!-- Tab Content -->
            <div class="main-content container">
    <!-- Tab Navigation -->

    <!-- Tab Content -->
    <div class="main-content container">
    <!-- Tab Navigation -->
    <div class="d-flex justify-content-center mt-4">
        <button class="btn btn-light active" id="personal-info-tab">Personal Information</button>
        <button class="btn btn-light" id="manage-contact-tab">Manage Contact</button>
    </div>

    <!-- Tab Content -->
    <div class="tab-content active" id="personal-info-content"> 
        <div class="form-container mt-4 p-4 rounded bg-white shadow-sm">
            <!-- Photo Upload Section at the Top -->
            <div class="form-group">
                    <label for="photo" class="form-label">Upload Photo</label>
                    <input type="file" class="form-control" id="photo" name="photo" accept="image/*">
                </div>

            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="first_name" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $user->first_name }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="last_name" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $user->last_name }}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" value="{{ $user->username }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="city" class="form-label">City</label>
                        <input type="text" class="form-control" id="city" name="city" value="{{ $user->city }}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="dob" class="form-label">Date of Birth</label>
                        <input type="date" class="form-control" id="dob" name="dob" value="{{ $user->dob }}" required>
                    </div>
                    <div class="col-md-6"> 
                        <label for="gender" class="form-label">Gender</label>
                        <div class="d-flex align-items-center">
                            <div class="form-check mr-3">
                                <input class="form-check-input" type="radio" name="gender" id="male" value="male" {{ $user->gender == 'male' ? 'checked' : '' }}>
                                <label class="form-check-label" for="male">Male</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="female" value="female" {{ $user->gender == 'female' ? 'checked' : '' }}>
                                <label class="form-check-label" for="female">Female</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="address" class="form-label">Address</label>
                    <textarea class="form-control" id="address" name="address" rows="3">{{ $user->address }}</textarea>
                </div>

                <div class="d-flex justify-content-center mt-4">
                    <button type="submit" class="btn btn-primary mx-2">Submit</button>
                    <button type="button" class="btn btn-secondary mx-2">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
            <div class="tab-content" id="manage-contact-content">
                <div class="form-container mt-4 p-4 rounded bg-white shadow-sm"><h3>Manage Contact</h3>
                    <form action="{{ route('contact.update') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">

                        <div class="form-group">
                            <label for="phone" class="form-label">Contat Number</label>
                            <input type="tel" class="form-control" id="phone" name="phone" value="{{ $user->phone }}" required>
                        </div>
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                        </div>
                        <div>
                            <label for="email" class="form-label">Url</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                        </div>
                        <div class="d-flex justify-content-center mt-4">
                            <button type="submit" class="btn btn-primary mx-2">Submit</button>
                            <button type="button" class="btn btn-secondary mx-2">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('personal-info-tab').addEventListener('click', function() {
            document.getElementById('personal-info-content').classList.add('active');
            document.getElementById('manage-contact-content').classList.remove('active');
            this.classList.add('active');
            document.getElementById('manage-contact-tab').classList.remove('active');
        });

        document.getElementById('manage-contact-tab').addEventListener('click', function() {
            document.getElementById('manage-contact-content').classList.add('active');
            document.getElementById('personal-info-content').classList.remove('active');
            this.classList.add('active');
            document.getElementById('personal-info-tab').classList.remove('active');
        });
    </script>
</body>
</html> 


