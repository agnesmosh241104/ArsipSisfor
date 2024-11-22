<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Upload;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    /**
     * Menampilkan form upload.
     */
    public function index()
    {
        // Ambil semua data dari tabel 'uploads'
        $documents = Upload::all();

        // Kirim data $documents ke view 'documents.index'
        return view('documents.create', compact('documents'));
    } 
    /**
     * Menyimpan data upload.
     */
    public function store(Request $request)
    {
        $request->validate([ 
            'id_doc' => 'required|string',
            'nama' => 'required|string|max:255',
            'tahun' => 'required|integer|min:1900|max:' . date('Y'),
            'file' => 'required|file|mimes:pdf,doc,docx,jpg,png|max:2048', // Max 2MB
        ]);

        // Simpan file ke storage
        $filePath = $request->file('file')->store('uploads', 'public');

        // Simpan data ke database
        Upload::create([
            'jenis_dokumen' => $request->id_doc,
            'nama' => $request->nama,
            'tahun' => $request->tahun,
            'file_path' => $filePath,
        ]);

        return redirect()->back()->with('success', 'Upload berhasil disimpan.');
    }
}

