@extends('layouts.app')

@section('content')
<div class="container">
    <div class="header-container">
        <h3 class="starred-header text-center">Favorit File</h3>
    </div>

    <table class="table table-striped table-hover">
        <thead class="bg-primary">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama File</th>
                <th scope="col">Dibuat Oleh</th>
                <th scope="col">Tanggal Dibuat</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($files as $index => $file)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $file->name }}</td>
                <td>{{ Auth::user()->name ?? 'Tidak diketahui' }}</td>
                <td>{{ $file->created_at->format('d M Y, H:i') }}</td>
                <td>
                    <div class="btn-group" role="group" aria-label="File Actions">
                        <!-- View Button -->
                        <a href="{{ asset('storage/' . $file->path) }}" target="_blank" class="btn btn-info btn-sm rounded-circle" title="Lihat File">
                            <i class="fa fa-eye"></i>
                        </a>

                        <!-- Star/Unstar Button -->
                        <form action="{{ route('files.toggle-star', ['file' => $file->id]) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-warning btn-sm rounded-circle" title="{{ $file->starred ? 'Unstar' : 'Star' }}">
                                <i class="fa {{ $file->starred ? 'fa-star' : 'fa-star-o' }}"></i>
                            </button>
                        </form>

                        <!-- Delete Button -->
                        <form action="{{ route('files.destroy', ['file' => $file->name]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm rounded-circle" onclick="return confirm('Apakah Anda yakin ingin menghapus file ini?')" title="Hapus File">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center text-muted">Tidak ada file yang diberi tanda bintang.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

@section('styles')
<style>
    /* Header Styling */
    .header-container {
        margin-bottom: 30px;
    }

    body {
        background-color: #f9f9f9;
    }

    .starred-header {
        font-size: 32px;
        font-weight: bold;
        color: #343a40;
        padding: 20px;
        background-color: #f8f9fa;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        display: inline-block;
        position: relative;
    }

    .starred-header::before {
        content: '\2605'; /* Unicode star symbol */
        font-size: 40px;
        color: #ffc107;
        position: absolute;
        top: 50%;
        left: 20px;
        transform: translateY(-50%);
    }

    .starred-header::after {
        content: ' Starred Files';
        font-size: 24px;
        font-weight: 600;
        color: #007bff;
        margin-left: 40px;
        position: absolute;
        top: 50%;
        left: 50px;
        transform: translateY(-50%);
    }

    .table {
        margin-top: 20px;
        border-radius: 10px;
        overflow: hidden;
    }

    .table th, .table td {
        text-align: left;
        vertical-align: middle;
    }

    .btn i {
        font-size: 14px;
    }

    .btn-group .btn {
        margin: 0;
        border-radius: 50%;
        width: 36px;
        height: 36px;
        display: flex;
        align-items: left;
        justify-content: left;
    }
</style>
@endsection
