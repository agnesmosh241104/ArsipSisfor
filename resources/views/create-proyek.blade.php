{{-- resources/views/create_proyek.blade.php --}}


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Proyek</title>
</head>
<body>
    <h1>Create Proyek</h1>
    <form action="{{ route('create-proyek') }}" method="POST">
        @csrf
        <label for="nama">Nama Proyek:</label>

        <input type="text" id="nama" name="nama" required>
        
        <label for="deskripsi">Deskripsi Proyek:</label>
        <textarea id="deskripsi" name="deskripsi" required></textarea>
        
        <button type="submit">Buat Proyek</button>
    </form>
</body>
</html>
