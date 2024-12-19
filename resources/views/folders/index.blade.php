@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Notifikasi -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @elseif(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <style>
        body {
            background-color: #f4f6f9; /* Latar belakang penuh */
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .header {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 20px;
            animation: fadeInSlide 1s ease-in-out;
            text-align: center;
        }

        @keyframes fadeInSlide {
            0% {
                opacity: 0;
                transform: translateY(-20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .card {
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
        }

        

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        }

        .card-title {
            font-size: 1rem;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .btn-icon {
            padding: 0.5rem;
            font-size: 1rem;
            border-radius: 50%;
            display: inline-block;
            text-align: center;
            color: #fff;
            margin-bottom: 5px;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }

        .icon-label {
            display: block;
            font-size: 0.85rem;
            color: #333;
        }
    </style>

    <h3 class="header">Daftar Folder di Kategori: {{ ucfirst($category) }}</h3>

    <!-- Folder Cards -->
    <div class="row">
        @foreach ($folders as $folder)
            <div class="col-md-4">
                <div class="card mb-3 shadow-sm border-0">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $folder->name }}</h5>

                        <!-- Upload File Button -->
                        <a href="{{ route('upload-file', ['category' => $category, 'folder' => $folder->id]) }}" class="btn btn-primary btn-icon" title="Upload File">
                            <i class="fas fa-upload"></i>
                        </a>
                        <span class="icon-label">Unggah file</span>

                        <!-- Delete Button -->
                        <form action="{{ route('folders.destroy', ['folder' => $folder->id]) }}" method="POST" class="d-inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-icon" title="Hapus Folder" onclick="return confirm('Apakah Anda yakin ingin menghapus folder ini?')">
                                <i class="fas fa-trash"></i>
                            </button>
                            <span class="icon-label">Hapus Folder</span>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <a href="{{ route('dashboard') }}" class="btn btn-secondary mt-3">Kembali ke Dashboard</a>
</div>

<!-- Load Font Awesome -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
@endsection
