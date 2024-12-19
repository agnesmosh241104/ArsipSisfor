<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    // Menampilkan profil pengguna yang sedang login
    public function show(Request $request)
    {
        $user = $request->user();

        return response()->json([
            'status' => 'success',
            'data' => [
                'name' => $user->name,
                'email' => $user->email,
                'status' => $user->status,
                'photo_url' => $user->photo ? asset('storage/' . $user->photo) : asset('assets/images/default-profile.jpg'),
            ],
            'links' => [
                'self' => route('profile.show'), // Link ke resource saat ini
                'update_profile' => route('profile.update'), // Link untuk update profil
                'delete_photo' => route('profile.deletePhoto'), // Link untuk menghapus foto profil
                'logout' => route('logout'), // Link untuk logout
            ]
        ]);
    }

    // Memperbarui profil pengguna
    public function update(Request $request)
    {
        $user = Auth::user();

        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'status' => 'nullable|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Update data pengguna
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->status = $request->input('status');

        // Jika ada foto baru, hapus foto lama dan simpan foto baru
        if ($request->hasFile('photo')) {
            if ($user->photo && Storage::exists('public/' . $user->photo)) {
                Storage::delete('public/' . $user->photo);
            }

            $path = $request->file('photo')->store('profile_photos', 'public');
            $user->photo = $path;
        }

        $user->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Profile updated successfully',
            'data' => [
                'name' => $user->name,
                'email' => $user->email,
                'status' => $user->status,
                'photo_url' => $user->photo ? asset('storage/' . $user->photo) : asset('assets/images/default-profile.jpg'),
            ],
            'links' => [
                'self' => route('profile.show'), // Link ke resource saat ini
                'update_profile' => route('profile.update'), // Link untuk memperbarui profil
                'delete_photo' => route('profile.deletePhoto'), // Link untuk menghapus foto profil
                'logout' => route('logout'), // Link untuk logout
            ]
        ]);
    }
}
