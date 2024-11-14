<form action="{{ route('upload.file') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="file">
    <button type="submit">Upload</button>
</form>
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('filePath'))
    <div class="uploaded-file">
        <p>File berhasil diunggah! Anda dapat melihatnya di bawah ini:</p>
        <a href="{{ session('filePath') }}" target="_blank">Lihat File</a>
        <!-- Jika file adalah gambar, tampilkan secara langsung -->
        @if (in_array(pathinfo(session('filePath'), PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png']))
            <img src="{{ session('filePath') }}" alt="Uploaded File" style="max-width: 100%; height: auto;">
        @endif
    </div>
@endif
