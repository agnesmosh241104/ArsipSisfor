@extends('layouts.app')

@section('content')

<style>
    /* Table Styling */
    /* Header yang sederhana dan elegan */
    .file-management-header {
        font-size: 32px;
        font-weight: 600;
        color: #333; /* Warna teks gelap untuk kesan elegan */
        text-align: left;
        margin-bottom: 20px;
        padding: 10px;
        background-color: #f8f9fa; /* Warna latar belakang netral */
    }

    body{
        background-color: #f9f9f9
    }

    .table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    .table th, .table td {
        padding: 8px 15px;  /* Adjusted padding for better alignment */
        border: 1px solid #ffffff;
        text-align: left;
        word-wrap: break-word;  /* Ensures long text doesn't overflow */
        max-width: 200px;  /* Limiting the width of the columns */
    }

    /* Remove background color from header */
    .table th {
        font-weight: bold;
        background-color: transparent;  /* No background color */
    }

    /* Button Styling */
    .btn {
        padding: 6px 12px;
        font-size: 14px;
        text-decoration: none;
        border-radius: 4px;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
    }

    /* Action Buttons */
    .btn-info {
        background-color: #17a2b8;
        color: white;
    }

    .btn-primary {
        background-color: #007bff;
        color: white;
    }

    .btn-danger {
        background-color: #dc3545;
        color: white;
    }

    /* Icon Styling */
    .btn .fas {
        margin-right: 5px;  /* Spacing between icon and text */
    }

    /* Small Action Buttons */
    .btn-sm {
        padding: 5px 10px;  /* Smaller padding for smaller buttons */
        font-size: 12px;  /* Smaller font size */
        border-radius: 20px;  /* More rounded edges for buttons */
    }

    /* Apply button size and icon for actions */
    form button[type="submit"] {
        padding: 5px 10px;
        font-size: 12px;
        display: inline-flex;
        align-items: center;
    }

    form button[type="submit"] .fas {
        margin-right: 5px;
    }

    table .btn-group button {
        margin: 0 5px;
    }
</style>

<div class="container">
    <!-- Notifikasi -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @elseif(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

{{-- <h1 class="file-management-header">File</h1> <!-- Menambahkan kelas khusus untuk header --> --}}

{{-- <h1>Files in Category: {{ $category }}</h1> --}}
<div class="container mt-4">
    <h2 class="text-center mb-4">File</h2>
    
<a>Form Pencarian File</a>
<!-- Dropdown untuk Memilih Kategori -->
<form action="{{ route('files.index') }}" method="GET" class="mb-4">
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
    <!-- Kategori yang Dipilih -->
    <div class="mb-5 shadow-sm p-3 bg-light rounded">
        <h4 class="text-primary mb-3">{{ $categories[$currentCategory] }}</h4>
<!-- Tabel daftar file -->
<table class="table">
    <thead>
        <tr>
            <th>No</th> <!-- Menambahkan kolom Nomor -->
            <th>Nama</th>
            <th>Deskripsi</th>
            <th>Jenis Dokumen</th> <!-- Kolom kategori -->
            <th>Terakhir diubah</th>
            <th>Ukuran file</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($files as $index => $file)
        <tr>
            <td>{{ $index + 1 }}</td> <!-- Menambahkan nomor file -->
            <td>{{ $file->name }}</td>
            <td>{{ $file->description ?? 'No description' }}</td>
            <td>{{ $file->category }}</td>
            <td>{{ $file->updated_at->format('d M Y') }}</td>
            <td>{{ number_format($file->size / 1024, 2) }} KB</td>
            <td>
                <!-- View File -->
                <a href="{{ route('files.show', $file->name) }}" class="btn btn-info btn-sm">
                    <i class="fas fa-eye"></i> Lihat
                </a>
                
                <!-- Update File Form -->
                <form action="{{ route('files.update', $file->name) }}" method="POST" enctype="multipart/form-data" style="display:inline;" onsubmit="return confirmUpdate()">
                    @csrf
                    @method('PUT')
                    <input type="file" name="file" required>
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fas fa-upload"></i> Ubah
                    </button>
                </form>
        
                <!-- Delete File Form -->
<form id="delete-form-{{ $file->id }}" action="{{ route('files.destroy', $file->name) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete(event, {{ $file->id }})">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger btn-sm">
        <i class="fas fa-trash"></i> Hapus
    </button>
</form>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<!-- Tombol Kembali ke Dashboard -->
<div class="mt-4">
    <a href="{{ route('dashboard') }}" class="btn btn-secondary">Kembali ke Dashboard</a>
</div>

<script>
    // JavaScript confirmation for the Update form
    function confirmUpdate() {
        return confirm('Apakah Anda yakin ingin memperbarui file ini?');
    }

    // JavaScript confirmation for the Delete form
    function confirmDelete() {
        return confirm('Apakah Anda yakin ingin menghapus file ini?');
    }
</script>

@endsection
