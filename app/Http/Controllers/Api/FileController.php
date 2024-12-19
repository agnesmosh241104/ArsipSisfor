<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function index()
    {
        $files = File::all();
        return response()->json($files);
    }

    public function show(File $file)
    {
        return response()->json($file);
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|file',
            'folder_id' => 'required|exists:folders,id',
        ]);

        $file = $request->file('file');
        $filePath = $file->store('files');

        $uploadedFile = File::create([
            'name' => $file->getClientOriginalName(),
            'path' => $filePath,
            'folder_id' => $request->folder_id,
            'user_id' => Auth::id(),
            'size' => $file->getSize(),
            'category' => $request->category,
        ]);

        return response()->json($uploadedFile, 201);
    }

    public function update(Request $request, File $file)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $file->update($request->all());

        return response()->json($file);
    }

    public function destroy(File $file)
    {
        Storage::delete($file->path);
        $file->delete();
        return response()->json(null, 204);
    }
}