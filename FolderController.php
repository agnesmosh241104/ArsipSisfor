<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Folder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FolderController extends Controller
{
    // Menampilkan Semua Folder (GET)
    public function index(Request $request)
    {
        // Ambil kategori folder jika ada
        $category = $request->query('category');

        $folders = Folder::when($category, function ($query, $category) {
            return $query->where('category', $category);
        })->get();

        // Tambahkan HATEOAS links untuk setiap folder
        $folders = $folders->map(function ($folder) {
            return [
                'id' => $folder->id,
                'name' => $folder->name,
                'category' => $folder->category,
                'description' => $folder->description,
                'created_at' => $folder->created_at,
                'updated_at' => $folder->updated_at,
                'links' => [
                    'self' => url("/api/folders/{$folder->id}"),
                    'update' => url("/api/folders/{$folder->id}"),
                    'delete' => url("/api/folders/{$folder->id}"),
                ],
            ];
        });

        return response()->json([
            'status' => 'success',
            'data' => $folders,
        ]);
    }

    // Menampilkan Folder Berdasarkan ID (GET)
    public function show($id)
    {
        $folder = Folder::find($id);

        // Jika folder tidak ditemukan
        if (!$folder) {
            return response()->json([
                'status' => 'error',
                'message' => 'Folder not found.',
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => [
                'id' => $folder->id,
                'name' => $folder->name,
                'category' => $folder->category,
                'description' => $folder->description,
                'created_at' => $folder->created_at,
                'updated_at' => $folder->updated_at,
                'links' => [
                    'self' => url("/api/folders/{$folder->id}"),
                    'update' => url("/api/folders/{$folder->id}"),
                    'delete' => url("/api/folders/{$folder->id}"),
                ],
            ],
        ]);
    }

    // Mengupdate Folder (PUT)
    public function update(Request $request, $id)
    {
        $folder = Folder::find($id);

        // Jika folder tidak ditemukan
        if (!$folder) {
            return response()->json([
                'status' => 'error',
                'message' => 'Folder not found.',
            ], 404);
        }

        // Validasi data yang dikirimkan
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors(),
            ], 400);
        }

        // Update data folder
        $folder->name = $request->input('name');
        $folder->category = $request->input('category');
        $folder->description = $request->input('description', $folder->description);
        $folder->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Folder updated successfully.',
            'data' => [
                'id' => $folder->id,
                'name' => $folder->name,
                'category' => $folder->category,
                'description' => $folder->description,
                'created_at' => $folder->created_at,
                'updated_at' => $folder->updated_at,
                'links' => [
                    'self' => url("/api/folders/{$folder->id}"),
                    'delete' => url("/api/folders/{$folder->id}"),
                ],
            ],
        ]);
    }

    // Menghapus Folder (DELETE)
    public function destroy($id)
    {
        $folder = Folder::find($id);

        // Jika folder tidak ditemukan
        if (!$folder) {
            return response()->json([
                'status' => 'error',
                'message' => 'Folder not found.',
            ], 404);
        }

        // Hapus folder
        $folder->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Folder deleted successfully.',
            'links' => [
                'list_folders' => url("/api/folders"),
                'create_folder' => url("/api/folders"),
            ],
        ]);
    }
}
