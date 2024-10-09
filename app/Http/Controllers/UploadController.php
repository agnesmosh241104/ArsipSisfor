<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    /**
     * Display the form to upload files and folders.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('UploadFileFolder'); // Tampilkan halaman form upload
    }

    /**
     * Handle the upload of files.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function upload(Request $request)
    {
        // Validasi input file
        $request->validate([
            'file' => 'required|file|max:10240', // Max size 10MB
        ]);

        // Ambil file dari request
        $file = $request->file('file');

        // Tentukan direktori tujuan
        $destinationPath = 'dokumen_akademik';

        // Simpan file ke direktori yang ditentukan
        $filePath = $file->store($destinationPath);

        // Berikan feedback ke pengguna bahwa file berhasil diupload
        return redirect()->back()->with('success', 'File uploaded successfully: ' . $filePath);
    }

    /**
     * Handle the creation of a new folder.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createFolder(Request $request)
    {
        // Validasi nama folder
        $request->validate([
            'folder_name' => 'required|string|max:255',
        ]);

        // Tentukan nama folder
        $folderName = $request->input('folder_name');
        $destinationPath = 'dokumen_akademik/' . $folderName;

        // Cek apakah folder sudah ada
        if (Storage::exists($destinationPath)) {
            return redirect()->back()->with('error', 'Folder already exists.');
        }

        // Buat folder baru
        Storage::makeDirectory($destinationPath);

        // Berikan feedback bahwa folder berhasil dibuat
        return redirect()->back()->with('success', 'Folder created successfully: ' . $folderName);
    }

    /**
     * Handle the upload of multiple files (or folders).
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function uploadMultiple(Request $request)
    {
        // Validasi file upload
        $request->validate([
            'files.*' => 'required|file|max:10240', // Max size 10MB per file
        ]);

        $destinationPath = 'dokumen_akademik';

        // Iterasi dan upload setiap file
        foreach ($request->file('files') as $file) {
            $file->store($destinationPath);
        }

        // Berikan feedback bahwa file berhasil diupload
        return redirect()->back()->with('success', 'Files uploaded successfully.');
    }
}
