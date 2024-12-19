<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Api\BaseController as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Folder;
use App\Models\File;
use App\Models\Activity;

class FolderController extends BaseController
{
    public function getAll($category)
    {
        $auth = Auth::user();
        $folders = Folder::where('user_id', $auth->id)
            ->where('category', $category)
            ->orderBy('created_at', 'desc')
            ->get();

        return $this->sendResponse("Berhasil mengambil data folder.", $folders);
    }

    public function getById($category, $folderId)
    {
        $auth = Auth::user();
        $folder = Folder::where('user_id', $auth->id)
            ->where('id', $folderId)
            ->where('category', $category)
            ->first();

        if (!$folder) {
            return $this->sendError("Data folder tidak tersedia.", [], 404);
        }

        $files = File::where('folder_id', $folderId)->get();

        return $this->sendResponse("Berhasil mengambil data folder.", [
            'folder' => $folder,
            'files' => $files
        ]);
    }

    public function post(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'category' => 'required|string',
        ]);

        if ($validator->fails()) {
            return $this->sendError("Data tidak valid.", $validator->errors(), 400);
        }

        $auth = Auth::user();

        $folder = Folder::create([
            'name' => $request->name,
            'category' => $request->category,
            'user_id' => $auth->id,
        ]);

        return $this->sendResponse(["folder_id" => $folder->id], "Berhasil menambahkan folder.");
    }

    public function delete($id)
    {
        $auth = Auth::user();
        $folder = Folder::where('id', $id)->where('user_id', $auth->id)->first();

        if (!$folder) {
            return $this->sendError("Data folder tidak tersedia.", [], 404);
        }

        // Hapus semua file dalam folder
        File::where('folder_id', $id)->delete();

        $folder->delete();

        return $this->sendResponse(null, "Berhasil menghapus folder.");
    }

    public function uploadFile(Request $request, $folderId)
    {
        $validator = Validator::make($request->all(), [
            'file' => 'required|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048',
            'description' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return $this->sendError("Data tidak valid.", $validator->errors(), 400);
        }

        $auth = Auth::user();
        $folder = Folder::where('id', $folderId)->where('user_id', $auth->id)->first();

        if (!$folder) {
            return $this->sendError("Folder tidak ditemukan.", [], 404);
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
            'user_id' => $auth->id,
            'size' => $fileSize,
        ]);

        Activity::create([
            'user_id' => $auth->id,
            'action' => 'uploaded',
            'file_id' => $uploadedFile->id,
        ]);

        return $this->sendResponse(["file_id" => $uploadedFile->id], "File berhasil diupload.");
    }

    public function viewFile($fileId)
    {
        $auth = Auth::user();
        $file = File::where('id', $fileId)->where('user_id', $auth->id)->first();

        if (!$file) {
            return $this->sendError("File tidak ditemukan.", [], 404);
        }

        Activity::create([
            'user_id' => $auth->id,
            'action' => 'viewed',
            'file_id' => $file->id,
        ]);

        return response()->file(storage_path('app/public/' . $file->path));
    }
}
