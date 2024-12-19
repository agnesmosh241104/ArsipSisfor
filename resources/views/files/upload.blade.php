@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Upload File ke Kategori: {{ $category }}</h1>
    <form action="{{ route('files.upload') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="category" value="{{ $category }}">
        <div class="form-group">
            <label for="file">Pilih File:</label>
            <input type="file" name="file" id="file" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary mt-3">Upload</button>
    </form>
</div>
@endsection
