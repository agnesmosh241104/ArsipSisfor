<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StarredController extends Controller
{
    // Menampilkan Semua File yang Diberi Bintang (GET)
    public function showStarred()
    {
        // Ambil semua file yang di-starred
        $files = File::where('starred', true)->get();

        // Jika tidak ada file yang di-star
        if ($files->isEmpty()) {
            return response()->json([
                'status' => 'error',
                'message' => 'No starred files found.',
            ], 404);
        }

        // Tambahkan HATEOAS links untuk setiap file
        $files = $files->map(function ($file) {
            return [
                'id' => $file->id,
                'name' => $file->name,
                'path' => $file->path,
                'starred' => $file->starred,
                'links' => [
                    'self' => url("/api/files/{$file->id}"),
                    'toggle_star' => url("/api/files/{$file->id}/toggle-star"),
                    'delete' => url("/api/files/{$file->id}"),
                ],
            ];
        });

        return response()->json([
            'status' => 'success',
            'data' => $files,
        ]);
    }

    // Toggle status bintang pada file (PUT)
    public function toggleStar($id)
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

        // Toggle status starred
        $file->starred = !$file->starred;
        $file->save();

        return response()->json([
            'status' => 'success',
            'message' => $file->starred ? 'File starred.' : 'File unstarred.',
            'data' => [
                'id' => $file->id,
                'name' => $file->name,
                'path' => $file->path,
                'starred' => $file->starred,
                'links' => [
                    'self' => url("/api/files/{$file->id}"),
                    'toggle_star' => url("/api/files/{$file->id}/toggle-star"),
                    'delete' => url("/api/files/{$file->id}"),
                ],
            ],
        ]);
    }

    // Menghapus File (DELETE)
    public function destroy($id)
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

        // Hapus file dari storage jika ada
        if ($file->path && Storage::exists('public/' . $file->path)) {
            Storage::delete('public/' . $file->path);
        }

        // Hapus file dari database
        $file->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'File deleted successfully.',
            'links' => [
                'list_starred_files' => url("/api/files/starred"),
            ],
        ]);
    }
}
  