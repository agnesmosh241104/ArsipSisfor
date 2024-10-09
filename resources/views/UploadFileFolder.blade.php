@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Document Management: Upload and Create Folders</h2>

    <!-- Pesan Sukses atau Error -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <!-- Form untuk Membuat Folder Baru -->
    <div class="card mb-4">
        <div class="card-header">
            <h4>Create New Folder</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('new-folder') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="folder_name" class="form-label">Folder Name</label>
                    <input type="text" class="form-control" id="folder_name" name="folder_name" placeholder="Enter folder name" required>
                </div>
                <button type="submit" class="btn btn-success">Create Folder</button>
            </form>
        </div>
    </div>

    <!-- Form untuk Upload File -->
    <div class="card mb-4">
        <div class="card-header">
            <h4>Upload File</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('upload-file') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="file" class="form-label">Choose File</label>
                    <input type="file" class="form-control" id="file" name="file" required>
                </div>
                <button type="submit" class="btn btn-primary">Upload File</button>
            </form>
        </div>
    </div>

    <!-- Form untuk Upload Multiple Files -->
    <div class="card mb-4">
        <div class="card-header">
            <h4>Upload Multiple Files</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('upload-multiple') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="files" class="form-label">Choose Multiple Files</label>
                    <input type="file" class="form-control" id="files" name="files[]" multiple required>
                </div>
                <button type="submit" class="btn btn-warning">Upload Multiple Files</button>
            </form>
        </div>
    </div>

    <!-- Form untuk Upload Folder (gunakan input directory di browser modern) -->
    <div class="card mb-4">
        <div class="card-header">
            <h4>Upload Folder</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('upload-multiple') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="folder_upload" class="form-label">Choose Folder</label>
                    <input type="file" class="form-control" id="folder_upload" name="files[]" webkitdirectory mozdirectory multiple required>
                </div>
                <button type="submit" class="btn btn-info">Upload Folder</button>
            </form>
        </div>
    </div>

</div>
@endsection
