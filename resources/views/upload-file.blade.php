@extends('layouts.app')

@section('content')
<!-- Styling for the upload form -->
<style>
    /* Card Styling */
    .card {
        width: 100%;
        max-width: 600px;
        margin: 40px auto;
        border-radius: 10px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        background-color: #ffffff;
        border: none;
        overflow: hidden;
        height: auto;
    }

    body {
        background-color: #f9f9f9;
    }
    
    .card-header {
        background-color: #007bff;
        padding: 15px;
        text-align: center;
        color: rgb(15, 4, 4);
    }

    .card-header h3 {
        font-size: 1.8rem;
        margin: 0;
    }

    .card-body {
        padding: 15px;
        font-family: 'Arial', sans-serif;
    }

    .form-group {
        margin-bottom: 20px;
    }

    /* Flexbox layout for file input and additional fields */
    .upload-container {
        display: flex;
        justify-content: space-between;
        gap: 20px;
        flex-wrap: wrap;
    }

    /* File input styling */
    .file-input-wrapper {
        position: relative;
        flex: 1;
        text-align: center;
    }

    input[type="file"] {
        display: none;
    }

    .file-input {
        background-color: #007bff;
        color: white;
        padding: 12px 20px;
        font-size: 16px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        display: inline-block;
        margin-top: 50px;
    }

    .file-input:hover {
        background-color: #0056b3;
    }

    .file-name {
        margin-top: 10px;
        font-size: 0.9rem;
        color: #555;
    }

    label {
        font-size: 1rem;
        font-weight: bold;
        margin-bottom: 5px;
        display: block;
        color: #333;
    }

    /* Additional information form (right side) */
    .info-form-wrapper {
        flex: 1;
    }

    .info-form-wrapper select, .info-form-wrapper textarea {
        width: 100%;
        padding: 10px;
        font-size: 14px;
        border-radius: 5px;
        border: 1px solid #ccc;
        margin-top: 5px;
    }

    .info-form-wrapper label {
        margin-bottom: 10px;
    }

    /* Button Styling */
    button[type="submit"] {
        width: 60%;
        margin-top: 50px;
    }

    button[type="submit"]:hover {
        background-color: #0056b3;
    }

    /* Cancel Button */
    a.btn-secondary {
        width: 60%;
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

    a.btn-secondary:hover {
        background-color: #5a6268;
    }

    /* Responsiveness */
    @media (max-width: 768px) {
        .upload-container {
            flex-direction: column;
        }

        .info-form-wrapper {
            margin-top: 20px;
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

    <!-- Upload File Form -->
    <div class="card">
        <div class="card-header">
            <h3>Upload File</h3>
        </div>
        <div class="upload-container">
            <form action="{{ route('files.upload') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- File Input Section -->
                <div class="file-input-wrapper">
                    <input type="file" id="file" name="file" required onchange="showFileName(this)">
                    <label for="file" class="file-input">Pilih File</label>
                    <p class="file-name" id="file-name">File belum dipilih</p>
                </div>
                <!-- Additional Information Form Section -->
                <div class="info-form-wrapper"> 
                    <div class="form-group">
                        <label for="file-description">Deskripsi:</label>
                        <textarea id="file-description" name="description" rows="3" placeholder="Masukkan deskripsi file" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="category">Jenis Dokumen:</label>
                        <select name="category" class="form-control" required>
                            <option value="" disabled selected>Pilih jenis dokumen</option>
                            <option value="dokumenAkademik">Dokumen Akademik</option>
                            <option value="dokumenKompetisi">Dokumen Kompetisi</option>
                            <option value="laporanMagang">Dokumen Magang</option>
                            <option value="dokumenKepanitiaan">Dokumen Kepanitiaan</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Buat</button>
                    <a href="{{ route('dashboard') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function showFileName(input) {
        const fileName = input.files[0]?.name || "No file selected";
        document.getElementById('file-name').textContent = fileName;
    }
</script>

@endsection
