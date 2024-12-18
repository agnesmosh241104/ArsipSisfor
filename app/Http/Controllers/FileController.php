<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\File; // Model untuk menyimpan data file
use App\Models\Folder; // Model untuk menyimpan data folder
use Illuminate\Support\Facades\Auth;
use App\Models\Activity;

class FileController extends Controller
{
    //// Ambil semua folder berdasarkan kategori


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
    // $folders = Folder::where('category', $currentCategory)->get();
    $files = File::where('category', $currentCategory)->paginate(9);

    // Kirim data ke view
    return view('files.index', compact('categories', 'currentCategory', 'files'));
}
    // Create: Upload file
    public function upload(Request $request)
    {
       // Validate the incoming request
       $validatedData = $request->validate([
        'file' => 'required|file|mimes:jpg,png,pdf,docx|max:10240', // Adjust mime types and max size as needed
        'description' => 'required|string|max:255',
        'category' => 'required|string',
    ]);

        // Simpan file ke storage/public/uploads
        $path = $request->file('file')->store('uploads', 'public');

        // Simpan data file ke database
        File::create([
            'name' => $request->file('file')->getClientOriginalName(),
            'path' => $path,
            'category' => $request->category,
            'description' => $request->description,
            'size' => $request->file('file')->getSize(),
            // 'user_id' => Auth::id(),
        ]);

        return redirect()->route('files.index')->with('success', 'File uploaded successfully.');
    }

     // Menampilkan file berdasarkan nama file
     public function show($filename)
     {
         // Cari file berdasarkan nama
         $file = File::where('name', $filename)->first();
     
         if (!$file) {
             return redirect()->route('files.index')->with('error', 'File not found!');
         }
     
         // Buat URL untuk file yang diunggah
         $filePath = storage_path('app/public/' . $file->path);
     
         // Periksa apakah file ada di storage
         if (!file_exists($filePath)) {
             return redirect()->route('files.index')->with('error', 'File does not exist on server.');
         }
      
         // Mengembalikan response langsung untuk menampilkan file
         return response()->file($filePath);
     }
      
     //buat untuk menampilkan showstarred
        public function showStarred()
        { 
            $files = File::where('starred', true)->get();
        
            return view('files.starred', compact('files'));
        }

        public function toggleStar($filename)
        {
            $file = File::findOrFail($filename);
        
            // Toggle status 'starred'
            $file->starred = !$file->starred;
            $file->save();
        
            // Menambahkan notifikasi flash
            $message = $file->starred ? 'File telah diberi bintang.' : 'Bintang pada file telah dihapus.';
            return redirect()->route('files.starred')->with('success', $message);
        }

    // public function moveToTrash(File $file)
    // {
    //     $file->delete();

    //     return redirect()->back()->with('success', 'File moved to trash.');
    // }

    public function trash()
    {
        $files = File::onlyTrashed()->get();
        return view('files.trash', compact('files'));
    }

    public function restoreFromTrash($id)
    {
        $file = File::withTrashed()->findOrFail($id);
        $file->restore();

        return redirect()->route('files.trash')->with('success', 'File restored successfully.');
    }

    public function deletePermanently($id)
    {
        $file = File::withTrashed()->findOrFail($id);
        Storage::delete($file->path);
        $file->forceDelete();

        return redirect()->route('files.trash')->with('success', 'File deleted permanently.');
    }

     // Memperbarui file berdasarkan nama file
     public function update(Request $request, $filename)
     {
         $file = File::where('name', $filename)->first();
 
         if (!$file) {
             return redirect()->route('files.index')->with('error', 'File not found!');
         }
 
         // Validasi dan proses update
         $validatedData = $request->validate([
             'file' => 'required|file',
             'category' => 'required|string',
             'description' => 'required|string|max:255',
         ]);
 
         // Lakukan update file dan informasi lainnya
         if ($request->hasFile('file')) {
             $file->update([
                 'name' => $request->file('file')->getClientOriginalName(),
                 'size' => $request->file('file')->getSize(),
                 'description' => $request->input('description'),
                 'category' => $request->input('category'),
             ]);
         }
        return redirect()->route('files.index')->with('success', 'File updated successfully!');
}
    

    // Delete: Hapus file
    public function destroy($filename)
    {
        // Cari file berdasarkan ID
        $file = File::where('name', $filename)->firstOrFail();


    // Hapus file dari storage
    Storage::delete($file->path);
    
        // Hapus data file dari database
        $file->delete();
    
        // Redirect atau kembalikan respons
        return redirect()->route('files.index')->with('success', 'File berhasil dihapus.');
    }


    public function store(Request $request, $category, $folderId)
    {
        $request->validate([
            'file' => 'required|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048',
            'description' => 'required|string|max:255',
            'category' => 'required|string|max:255',
        ]);

        $folderData = Folder::find($folderId);

        if (!$folderData) {
            return redirect()->route('folders.index', $category)->with('error', 'Folder not found.');
        }

        $file = $request->file('file');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('uploads', $fileName, 'public');
        $fileSize = $file->getSize();

        $uploadedFile = File::create([
            'name' => $fileName,
            'path' => $filePath,
            'folder_id' => $folderId,
            'description' => $request->description,
            'category' => $category, // Menyimpan kategori file
            'user_id' => Auth::id(),
            'size' => $fileSize,
        ]);

        // Log aktivitas upload
        Activity::create([
            'user_id' => Auth::id(),
            'action' => 'uploaded',
            'file_id' => $uploadedFile->id,
            'category' => $request->category,
        ]);

        return redirect()->route('files.index')->with('success', 'File uploaded successfully.');
    }
}

