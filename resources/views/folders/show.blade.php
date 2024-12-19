@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Folder: {{ $folderData->name }}</h3>
    <p>Kategori: {{ ucfirst($category) }}</p>

    {{-- <h4>Upload File</h4>
    <form action="{{ route('files.upload', ['category' => $category, 'folder' => $folderData->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="file">Choose file</label>
            <input type="file" name="file" id="file" class="form-control">
        </div>
        <div class="form-group">
            <label for="file-description">Description:</label>
            <textarea id="file-description" name="description" rows="3" placeholder="Enter a description for the file" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Upload</button>
    </form> --}}

    <h4>Daftar File</h4>
    <ul class="list-group">
        @forelse ($files as $file)
            <li class="list-group-item">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <strong>Name:</strong> {{ $file->name }}<br>
                        <strong>Description:</strong> {{ $file->description }}<br>
                        <strong>Category:</strong> {{ $file->category }}<br>
                        <strong>Uploaded By:</strong> {{ $file->user->name }}<br>
                        <strong>Uploaded At:</strong> {{ $file->created_at->format('d M Y, H:i') }}<br>
                        <strong>Size:</strong> {{ number_format($file->size / 1024, 2) }} KB
                    </div>
                    <div class="actions">
                        <a href="{{ Storage::url($file->path) }}" class="btn btn-info btn-sm" target="_blank">View</a>
                        <form action="{{ route('files.destroy', ['category' => $category, 'folder' => $folderData->id, 'file' => $file->id]) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </div>
                </div>
            </li>
        @empty
            <p>Folder ini masih kosong.</p>
        @endforelse
    </ul>

    <a href="{{ route('folders.index', ['category' => $category]) }}" class="btn btn-secondary mt-3">Kembali ke Daftar Folder</a>
</div>
@endsection