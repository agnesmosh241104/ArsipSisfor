  <!-- Main Panel -->
  <div class="main-panel">
    <!-- Topbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
        <div class="container-fluid">
            <!-- Logo di sebelah kiri -->
            {{-- <a class="navbar-brand" href="#">
                <img src="{{ asset('path/to/logo.png') }}" alt="Logo ArsipSI" width="30" height="30" class="d-inline-block align-text-top">
                ArsipSI
            </a> --}}
    
            <!-- Tombol toggler untuk mode responsif -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
    
            <!-- Kontainer isi navbar -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Element di kanan -->
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <!-- Gambar Profile -->
                            <img src="{{ Auth::user()->photo ? asset('storage/' . Auth::user()->photo) : asset('assets/img/kaiadmin/Avatar.png') }}" 
                                 alt="User Avatar" class="rounded-circle" width="40" height="40" style="object-fit: cover;">
                        </a>
                        <!-- Dropdown Menu -->
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('profile') }}">Profile</a></li>
                            {{-- <li><a class="dropdown-item" href="#">Settings</a></li> --}}
                            <li><hr class="dropdown-divider"></li>
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
    