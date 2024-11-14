@extends('layouts.app')

@section('content')
    <h1>Edit Document</h1>
    <form action="{{ route('documents.update', $document->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama">Nama:</label>
            <input type="text" name="nama" id="nama" class="form-control" value="{{ $document->nama }}" required>
        </div>
        <div class="form-group">
            <label for="tahun">Tahun:</label>
            <input type="number" name="tahun" id="tahun" class="form-control" value="{{ $document->tahun }}" required>
        </div>
        <div class="form-group">
            <label for="file">File:</label>
            <input type="file" name="file" id="file" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
@endsection
