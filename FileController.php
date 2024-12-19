<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class FileController extends Controller
{
    // Menampilkan Semua File (GET)
    public function index(Request $request)
    {
        // Ambil semua file
        $files = File::all();

        // Tambahkan HATEOAS links untuk setiap file
        $files = $files->map(function ($file) {
            return [
                'id' => $file->id,
                'name' => $file->name,
                'path' => $file->path,
                'size' => $file->size,
                'links' => [
                    'self' => url("/api/files/{$file->name}"),
                    'update' => url("/api/files/{$file->name}"),
                    'delete' => url("/api/files/{$file->name}"),
                ],
            ];
        });

        return response()->json([
            'status' => 'success',
            'data' => $files,
        ]);
    }

    // Menampilkan File Berdasarkan Nama (GET)
    public function show($name)
    {
        // Cari file berdasarkan nama
        $file = File::where('name', $name)->first();

        // Jika file tidak ditemukan
        if (!$file) {
            return response()->json([
                'status' => 'error',
                'message' => 'File not found.',
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => [
                'id' => $file->id,
                'name' => $file->name,
                'path' => $file->path,
                'size' => $file->size,
                'links' => [
                    'self' => url("/api/files/{$file->name}"),
                    'update' => url("/api/files/{$file->name}"),
                    'delete' => url("/api/files/{$file->name}"),
                ],
            ],
        ]);
    }

    // Mengupdate File (UPDATE)
    public function update(Request $request, $name)
    {
        // Cari file berdasarkan nama
        $file = File::where('name', $name)->first();

        // Jika file tidak ditemukan
        if (!$file) {
            return response()->json([
                'status' => 'error',
                'message' => 'File not found.',
            ], 404);
        }

        // Validasi file baru
        $validator = Validator::make($request->all(), [
            'file' => 'required|file|mimes:jpeg,png,jpg,pdf,docx|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors(),
            ], 400);
        }

        // Hapus file lama jika ada
        if ($file->path && Storage::exists('public/' . $file->path)) {
            Storage::delete('public/' . $file->path);
        }

        // Simpan file baru
        $path = $request->file('file')->store('files', 'public');
        $file->path = $path;
        $file->size = $request->file('file')->getSize(); // Update ukuran file
        $file->save();

        return response()->json([
            'status' => 'success',
            'message' => 'File updated successfully.',
            'data' => [
                'id' => $file->id,
                'name' => $file->name,
                'path' => $file->path,
                'size' => $file->size,
                'links' => [
                    'self' => url("/api/files/{$file->name}"),
                    'delete' => url("/api/files/{$file->name}"),
                ],
            ],
        ]);
    }

    // Menghapus File (DELETE)
    public function destroy($name)
    {
        // Cari file berdasarkan nama
        $file = File::where('name', $name)->first();

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
            ],
        ]);
    }
}
