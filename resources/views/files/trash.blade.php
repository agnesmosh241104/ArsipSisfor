@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Trash</h3>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @forelse ($files as $file)
        <div class="col">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body">
                    <h5 class="card-title text-dark">{{ $file->name }}</h5>
                    <p class="card-text text-muted">
                        <strong>Dibuat:</strong> {{ $file->created_at->format('d M Y, H:i') }}<br>
                        <strong>Oleh:</strong> {{ $file->user->name ?? 'Tidak diketahui' }}
                    </p>
                    <a href="{{ asset('storage/' . $file->path) }}" target="_blank" class="btn btn-info btn-sm">View</a>
                    <form action="{{ route('restore-from-trash', ['id' => $file->id]) }}" method="POST" class="d-inline-block">
                        @csrf
                        <button type="submit" class="btn btn-success btn-sm">Restore</button>
                    </form>
                    <form action="{{ route('delete-file', ['id' => $file->id]) }}" method="POST" class="d-inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus file ini secara permanen?')">
                            <i class="fa fa-trash"></i> Delete Permanently
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @empty
        <p class="text-muted">Tidak ada file di trash.</p>
        @endforelse
    </div>
</div>
@endsection