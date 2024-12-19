@extends('layouts.app')

@section('content')

    <style>
        /* Header search result */
        h3 {
            font-size: 1.5rem;
            font-weight: bold;
            color: #333;
            margin-bottom: 1.5rem;
        }

        h3 span {
            font-weight: normal;
            font-size: 1rem;
            color: #888;
        }

        /* Tabel styling */
        .table {
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
            border-radius: 8px;
            background-color: #f8f9fa;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .table th,
        .table td {
            padding: 1rem;
            vertical-align: middle;
            text-align: center;
        }

        .table th {
            background-color: #007bff;
            color: #fff;
            font-size: 1rem;
            text-transform: uppercase;
            border-top: 1px solid #dee2e6;
        }

        .table td {
            background-color: #fff;
            border-top: 1px solid #dee2e6;
        }

        .table tbody tr:hover {
            background-color: #f1f1f1;
            cursor: pointer;
        }

        .table .actions {
            display: flex;
            justify-content: center;
            gap: 10px;
            align-items: center;
        }

        .table td a {
            text-decoration: none;
            color: #fff;
        }

        /* Tombol View dan Delete */
        .btn-sm {
            padding: 6px 12px;
            font-size: 0.875rem;
            border-radius: 50px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .btn-info {
            background-color: #17a2b8;
            border-color: #17a2b8;
        }

        .btn-info:hover {
            background-color: #138496;
            border-color: #117a8b;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }

        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #545b62;
        }

        /* Styling for table row numbering */
        .row-number {
            font-weight: bold;
            font-size: 1rem;
            color: #007bff;
        }

        /* Customize icon size */
        .fa {
            font-size: 1.1rem;
        }
    </style>

    <div class="container">
        <h3>Search Results for "<span>{{ $query }}</span>"</h3>

        @if (count($results) > 0)
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Created By</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($results as $index => $result)
                        <tr>
                            <td class="row-number">{{ $index + 1 }}</td>
                            <td>{{ $result->name }}</td>
                            <td>{{ Auth::user()->name ?? 'Unknown' }}</td>
                            <td>{{ $result->created_at->format('d M Y, H:i') }}</td>
                            <td class="actions">
                                <!-- View Button -->
                                <!-- View Button -->
                                <a href="{{ asset('storage/' . $result->path) }}" class="btn btn-info btn-sm" target="_blank">
                                    <i class="fa fa-eye"></i> View
                                </a>

                                <!-- Delete Button -->
                                {{-- <form
                                    action="{{ route('files.destroy', ['file' => $result->id]) }}?query={{ $query }}"
                                    method="POST" class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure you want to delete this file?')">
                                        <i class="fa fa-trash"></i> Delete
                                    </button>
                                </form> --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Back to Dashboard Button -->
            <div class="mt-4">
                <a href="{{ route('dashboard') }}" class="btn btn-secondary">Kembali ke Dashboard</a>
            </div>
        @else
            <p>No files found.</p>
        @endif
    </div>

@endsection
