@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Recent Activities</h3>
    <ul class="list-group">
        @forelse ($activities as $activity)
            <li class="list-group-item">
                <div>
                    <strong>{{ $activity->user->name }}</strong> {{ $activity->action }} 
                    @if ($activity->file)
                        the file <strong>{{ $activity->file->name }}</strong>
                    @endif
                    at {{ $activity->created_at->format('d M Y, H:i') }}
                </div>
            </li>
        @empty
            <p>No recent activities.</p>
        @endforelse
    </ul>
</div>
@endsection
