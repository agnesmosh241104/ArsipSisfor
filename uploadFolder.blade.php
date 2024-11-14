<!-- resources/views/upload.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload File</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        .upload-area {
            border: 2px dashed #007bff;
            padding: 20px;
            text-align: center;
            margin: 20px;
            transition: background-color 0.3s;
        }
        .upload-area:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Upload File</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @elseif(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form action="{{ route('upload-file') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="upload-area" id="uploadfile">
                <input type="file" name="file" required>
                <p>Drag and drop your files here or click to select files.</p>
            </div>
            <button type="submit" class="btn btn-primary">Upload</button>
        </form>
    </div>

    <script>
        const uploadArea = document.getElementById('uploadfile');
        uploadArea.addEventListener('click', () => {
            uploadArea.querySelector('input[type="file"]').click();
        });

        uploadArea.addEventListener('dragover', (e) => {
            e.preventDefault();
            uploadArea.classList.add('hover');
        });

        uploadArea.addEventListener('dragleave', () => {
            uploadArea.classList.remove('hover');
        });

        uploadArea.addEventListener('drop', (e) => {
            e.preventDefault();
            const files = e.dataTransfer.files;
            uploadArea.querySelector('input[type="file"]').files = files;
        });
    </script>
</body>
</html>
