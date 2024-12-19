<!-- resources/views/search/results.blade.php -->
@if (count($results) > 0)
    <ul>
        @foreach ($results as $result)
            <li>{{ $result }}</li>
        @endforeach
    </ul>
@else
    <p>Tidak ada file atau folder yang ditemukan.</p>
@endif
