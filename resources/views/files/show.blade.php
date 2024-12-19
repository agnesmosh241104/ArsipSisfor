@extends('layouts.app')

@section('content')
<div class="container">
    <p>Kategori: {{ ucfirst($category) }}</p>

    <form action="{{ route('files.store', ['category' => $category, 'folder' => $folderData->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="file">Pilih File:</label>
            <input type="file" name="file" id="file" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Deskripsi:</label>
            <textarea id="description" name="description" rows="3" class="form-control" placeholder="Deskripsi file..." required></textarea>
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
        <button type="submit" class="btn btn-primary">Upload</button>
    </form>
</div>
@endsection    