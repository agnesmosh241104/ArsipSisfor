<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


namespace App\Http\Controllers;

use Illuminate\Http\Request; 

class FileController extends Controller
{
    public function uploadFile(Request $request)
    {
        // Validasi file yang diupload
        $request->validate([
            'file' => 'required|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048', // Atur validasi file sesuai kebutuhan
        ]);

        // Simpan file yang diupload
        if ($request->file()) {
            $fileName = time().'_'.$request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');

            // Simpan informasi file di database atau proses lainnya jika perlu
            return back()->with('success', 'File berhasil diupload')->with('file', $fileName);
        }

        return back()->with('error', 'File gagal diupload');
    }
}
