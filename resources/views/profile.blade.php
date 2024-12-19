<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Profile - ArsipSI</title>
    <link rel="stylesheet" href="{{ asset('assets/css/profile.css') }}">
</head>
<body>
    <div class="wrapper">
        <!-- Profile Content -->
        <div class="profile-container">
            <h3>Profil</h3>
            
            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Profile Photo Upload -->
                <div class="form-group">
                    <label for="photo" class="form-label">Edit Profil</label>
                    <div class="profile-photo">
                        <img id="photo-preview" src="{{ $user->photo_url }}" alt="Profile Photo">
                    </div>
                    <input type="file" class="form-control" id="photo" name="photo" accept="image/*">
                </div>

                <!-- Name -->
                <div class="form-group">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
                </div>

                <!-- Email -->
                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                </div>

                <!-- Status/Role (Dropdown Menu) -->
                <div class="form-group">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-control" id="status" name="status" required>
                        //active dan inactive
                        <option value="active" {{ $user->status == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ $user->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>
                
                @if(session('success'))
                <div class="custom-alert-success">
                    {{ session('success') }}
                </div>
            @endif

                <!-- Buttons -->
                <div class="d-flex justify-content-center mt-4">
                    <button type="submit" class="btn btn-primary mx-2">Simpan</button>
                    <a href="{{ route('dashboard') }}" class="btn btn-secondary mx-2 no-underline">Kembali</a>
                </div>
            </form>
        </div>
    </div>
    

    <!-- JavaScript for image preview -->
    <script>
        document.getElementById("photo").onchange = function(event) {
    const [file] = event.target.files;
    if (file) {
        const allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/svg+xml'];
        if (allowedTypes.includes(file.type)) {
            const photoPreview = document.getElementById("photo-preview");
            photoPreview.src = URL.createObjectURL(file);
            photoPreview.style.display = 'block';
        } else {
            alert("Invalid file type. Please upload an image.");
            this.value = ''; // Reset input
        }
    }
};

    </script>


</body>
</html>
