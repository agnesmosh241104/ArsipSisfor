@extends('layouts.app')

@section('content')
<style>
    .select-category {
    min-width: auto;
    width: auto;
    white-space: nowrap;
}

</style>

<div class="container mt-4">
    <h2 class="text-center mb-4">Daftar Dokumen</h2>
    
<a>Form Pencarian Dokumen</a>
<!-- Dropdown untuk Memilih Kategori -->
<form action="{{ route('documents.index') }}" method="GET" class="mb-4">
    <div class="input-group shadow-sm">
        <select name="category" class="form-select select-category" onchange="this.form.submit()">
            @foreach ($categories as $key => $category)
                <option value="{{ $key }}" {{ $currentCategory === $key ? 'selected' : '' }}>
                    {{ $category }}
                </option>
            @endforeach
        </select>
    </div>
</form>

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

    <!-- Kategori yang Dipilih -->
    <div class="mb-5 shadow-sm p-3 bg-light rounded">
        <h4 class="text-primary mb-3">{{ $categories[$currentCategory] }}</h4>

        <!-- Folders -->
        <h5>Folders</h5>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @forelse ($folders as $folder)
            <div class="col">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="card-title text-dark">{{ $folder->name }}</h5>
                        <p class="card-text text-muted">
                            <strong>Dibuat:</strong> {{ $folder->created_at->format('d M Y, H:i') }}<br>
                            <strong>Oleh:</strong> {{ Auth::user()->name ?? 'Tidak diketahui' }}
                        </p>
                        <div class="card-actions">
                            <a href="{{ route('files.index', ['folder' => $folder->id]) }}" class="btn btn-primary btn-sm">
                                <i class="fa fa-folder-open"></i>
                            </a>
                            <form action="{{ route('folders.destroy', ['folder' => $folder->id]) }}" method="POST" class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus folder ini?')">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <p class="text-muted">Tidak ada folder untuk kategori ini.</p>
            @endforelse
        </div>

        <!-- Files -->
        <h5 class="mt-4">Files</h5>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @forelse ($files as $file)
            <div class="col">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="card-title text-dark">{{ $file->name }}</h5>
                        <p class="card-text text-muted">
                            <strong>Dibuat:</strong> {{ $file->created_at->format('d M Y, H:i') }}<br>
                            <strong>Oleh:</strong> {{ Auth::user()->name ?? 'Tidak diketahui' }}
                        </p>
                        <div class="card-actions">
                            <a href="{{ asset('storage/' . $file->path) }}" target="_blank" class="btn btn-info btn-sm">
                                <i class="fa fa-eye"></i>
                            </a>
                            <form action="{{ route('files.toggle-star', ['file' => $file->id]) }}" method="POST" class="d-inline-block" id="star-form-{{ $file->id }}">
                                @csrf
                                <button type="button" class="btn btn-warning btn-sm" onclick="confirmStar('{{ $file->id }}')">
                                    <i class="fa {{ $file->starred ? 'fa-star' : 'fa-star-o' }}"></i>
                                </button>
                            </form>
                            <script>
                                function confirmStar(fileId) {
                                    // Konfirmasi pemberian bintang
                                    if (confirm('Apakah Anda yakin ingin memberi bintang pada file ini?')) {
                                        // Jika pengguna klik OK, submit form
                                        document.getElementById('star-form-' + fileId).submit();
                                    }
                                }
                            </script>
                            <form action="{{ route('files.destroy', ['file' => $file->name]) }}" method="POST" class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus file ini?')">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            @empty
            <p class="text-muted">Tidak ada file untuk kategori ini.</p>
            @endforelse
        </div>
    </div>
</div>

@endsection
