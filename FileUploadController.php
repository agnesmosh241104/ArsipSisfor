<?php

// In app/Http/Controllers/FileUploadController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileUploadController extends Controller
{
    public function uploadTugasProyekKuliah(Request $request)
    {
        // Validate file input
        $request->validate([
            'file.*' => 'required|file|max:10240'  // Limit file size to 10MB each
        ]);

        // Loop through each file and save it
        if ($request->hasFile('file')) {
            foreach ($request->file('file') as $file) {
                $file->store('tugas_proyek_kuliah', 'public'); // Store each file in the 'tugas_proyek_kuliah' directory
            }
        }

        return redirect()->back()->with('success', 'Files uploaded successfully.');
    }
}
