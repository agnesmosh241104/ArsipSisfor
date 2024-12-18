<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use App\Models\Folder;


class DocumentController extends Controller
{

  // public function index()
  // {
  //     $files = File::all();
  //     $folders = Folder::all();

  //     return view('documents', compact('files', 'folders'));

  // }

  public function index(Request $request)
{
    // Kategori dokumen
    $categories = [
        'dokumenAkademik' => 'Dokumen Akademik',
        'dokumenKompetisi' => 'Dokumen Kompetisi',
        'laporanMagang' => 'Dokumen Magang',
        'dokumenKepanitiaan' => 'Dokumen Kepanitiaan',
    ];

    // Tangkap kategori yang dipilih dari request
    $currentCategory = $request->input('category', 'dokumenAkademik');
    // Filter folder dan file berdasarkan kategori
    $folders = Folder::where('category', $currentCategory)->get();
    $files = File::where('category', $currentCategory)->paginate(9);

    // Kirim data ke view
    return view('documents', compact('categories', 'currentCategory', 'folders', 'files'));
}

//hapus folder dan file


public function destroy(Folder $folder)
{
    // Hapus semua file dalam folder terlebih dahulu
    if ($folder->files) {
        foreach ($folder->files as $file) {
            $file->delete();
        }
    }

    // Hapus folder
    $folder->delete();

    return redirect()->route('documents.index', ['category' => $folder->category])
        ->with('success', 'Folder berhasil dihapus.');
  }
  


}
