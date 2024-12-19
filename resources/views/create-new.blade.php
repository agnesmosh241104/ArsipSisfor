@extends('layouts.app')

@section('content')
<style>
    .card {
        width: 100%;
        max-width: 500px;
        margin: 40px auto;
        border-radius: 10px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        background-color: #ffffff;
        border: none;
    }

    body {
        background-color: #f9f9f9;
    }

    .card-header {
        background-color: #f0f8ff;
        padding: 15px;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        text-align: center;
    }

    .card-header h3 {
        font-size: 1.8rem;
        /* font-weight: 700; */
        color: #333;
    }

    .card-body {
        padding: 25px;
        font-family: 'Arial', sans-serif;
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
    font-size: 1rem;
    font-weight: bold;
    margin-bottom: 5px;
    display: block;
    color: #333;
}

    button:hover {
        background-color: #0056b3;
    }


    a.btn-secondary {
    width: 70%;
    padding: 12px 12px;
    text-align: center;
    font-size: 1rem;
    border-radius: 3px;
    background-color: #6c757d;
    color: white;
    text-decoration: none;
    display: inline-block;
    margin-top: 5px;
    transition: background-color 0.3s ease;
}

  /* Button Styling */
  button[type="submit"] {
        width: 70%;
        /* background-color: #007bff;
        color: white;
        padding: 12px 20px;
        font-size: 16px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        display: inline-block; */
       
    }

    a.btn-secondary:hover {
        background-color: #5a6268;
    }

    /* Responsiveness */
    @media (max-width: 768px) {
        .card {
            margin: 20px;
        }

        .card-header h3 {
            font-size: 1.5rem;
        }

        .form-group {
            margin-bottom: 15px;
        }

        button, a.btn-secondary {
            width: 100%;
            margin: 10px 0;
        }
    }
</style>

<div class="container">
    <!-- Notifikasi -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @elseif(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <!-- Form Create New -->
    <div class="card">
        <div class="card-header">
            <h3>Buat Folder</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('create-new-action') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Folder baru:</label>
                    <input type="text" name="name" class="form-control" placeholder="Folder tanpa nama" required>
                </div>
                <div class="form-group">
                    <label for="category">Jenis dokumen:</label>
                    <select name="category" id="category" class="form-control" required>
                        <option value="" disabled selected>Pilih dokumen</option>
                        <option value="dokumenAkademik">Dokumen Akademik</option>
                        <option value="dokumenKompetisi">Dokumen Kompetisi</option>
                        <option value="laporanMagang">Dokumen Magang</option>
                        <option value="dokumenKepanitiaan">Dokumen Kepanitiaan</option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Buat</button>
                    <a href="{{ route('dashboard') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
