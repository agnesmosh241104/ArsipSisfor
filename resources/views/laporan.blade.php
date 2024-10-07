<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ArsipSI</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="card-container">
            <div class="card">
                <img src="img/Drive.png" alt="Drive" width="100">
                <h3>Magang Bersetifikat</h3>
            </div>

            <div class="card">
                <img src="img/Drive.png" alt="Drive" width="100">
                <h3>Kerja Praktik</h3>
            </div>
        </div>

        <!-- Form Upload File -->
        <div class="card mt-5">
            <div class="card-body">
                <h5 class="card-title">Upload dokumen</h5>
                <form action="upload.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="fileUpload">Choose file to upload</label>
                        <input type="file" name="fileToUpload" id="fileToUpload" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Upload File</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
