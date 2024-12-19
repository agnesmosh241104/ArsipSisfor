<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\Folder;
use App\Models\File;
use App\Models\Activity;


class FolderController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string',
        ]);
    
        Folder::create([
            'name' => $request->name,
            'category' => $request->category,
            'user_id' => Auth::id(),
        ]);
    
        return redirect()->route('folders.index', $request->category)
            ->with('success', "Folder '{$request->name}' berhasil ditambahkan ke kategori {$request->category}.");
    }
    
    public function show($category, $folderId)
    {
        $folderData = Folder::find($folderId);
        $files = File::where('folder_id', $folderId)->get();
    
        return view('folders.show', [
            'folderData' => $folderData,
            'category' => $category,
            'files' => $files
        ]);
    }

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

        return redirect()->route('folders.index', ['category' => $folder->category])
            ->with('success', 'Folder berhasil dihapus.');
    }

    public function viewFile($fileId)
    {
        $file = File::find($fileId);
    
        if (!$file) {
            return redirect()->back()->with('error', 'File not found.');
        }
    
        // Log the view activity
        Activity::create([
            'user_id' => Auth::id(),
            'action' => 'viewed',
            'file_id' => $file->id,
        ]);
    
        return response()->file(storage_path('app/public/' . $file->path));
    }

public function uploadFile(Request $request, $category, $folderId)
{
    $request->validate([
        'file' => 'required|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048',
        'description' => 'required|string|max:255',
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
        'user_id' => Auth::id(),
        'size' => $fileSize,
        'category' => $request->category, // Simpan kategori file
    ]);

    // Log the upload activity
    Activity::create([
        'user_id' => Auth::id(),
        'action' => 'uploaded',
        'file_id' => $uploadedFile->id,
    ]);

    return redirect()->route('folders.show', ['category' => $category, 'folder' => $folderId])
        ->with('success', 'File uploaded successfully.');
}

public function index($category)
{
    // Ambil semua folder berdasarkan kategori
    $folders = Folder::where('category', $category)->get();

    return view('folders.index', compact('folders', 'category'));
}


}
