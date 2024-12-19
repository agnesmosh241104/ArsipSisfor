<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\File; // Model File
use App\Models\Folder; // Model Folder
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    // Menampilkan semua dokumen (GET)
    public function index(Request $request)
    {
        // Ambil parameter kategori jika ada
        $category = $request->query('category');

        // Ambil semua folder dan file, filter berdasarkan kategori jika tersedia
        $folders = Folder::when($category, function ($query, $category) {
            return $query->where('category', $category);
        })->get();

        $files = File::when($category, function ($query, $category) {
            return $query->where('category', $category);
        })->get();

        // Menambahkan tautan HATEOAS untuk folder
        $folders = $folders->map(function ($folder) {
            return [
                'id' => $folder->id,
                'name' => $folder->name,
                'category' => $folder->category,
                'links' => [
                    'self' => url("/api/folders/{$folder->id}"),
                    'delete' => url("/api/folders/{$folder->id}"),
                ]
            ];
        });

        // Menambahkan tautan HATEOAS untuk file
        $files = $files->map(function ($file) {
            return [
                'id' => $file->id,
                'name' => $file->name,
                'category' => $file->category,
                'path' => $file->path,
                'links' => [
                    'self' => url("/api/files/{$file->id}"),
                    'download' => url("/storage/{$file->path}"),
                    'delete' => url("/api/files/{$file->id}"),
                ]
            ];
        });

        return response()->json([
            'status' => 'success',
            'folders' => $folders,
            'files' => $files,
        ]);
    }

    // Menghapus file berdasarkan ID (DELETE)
    public function destroyFile($id)
    {
        // Cari file berdasarkan ID
        $file = File::find($id);

        // Jika file tidak ditemukan
        if (!$file) {
            return response()->json([
                'status' => 'error',
                'message' => 'File not found.',
            ], 404);
        }

        // Hapus file dari storage
        if ($file->path && Storage::exists('public/' . $file->path)) {
            Storage::delete('public/' . $file->path);
        }

        // Hapus file dari database
        $file->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'File deleted successfully.',
            'links' => [
                'list_files' => url("/api/files"),
                'create_file' => url("/api/files"),
            ]
        ]);
    }

    // Menghapus folder berdasarkan ID (DELETE)
    public function destroyFolder($id)
    {
        // Cari folder berdasarkan ID
        $folder = Folder::find($id);

        // Jika folder tidak ditemukan
        if (!$folder) {
            return response()->json([
                'status' => 'error',
                'message' => 'Folder not found.',
            ], 404);
        }

        // Hapus folder dari database
        $folder->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Folder deleted successfully.',
            'links' => [
                'list_folders' => url("/api/folders"),
                'create_folder' => url("/api/folders"),
            ]
        ]);
    }
}
