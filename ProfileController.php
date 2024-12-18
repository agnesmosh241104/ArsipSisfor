<?php

// app/Http/Controllers/ProfileController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function edit()
    {
        // Mendapatkan data pengguna yang sedang login
        $user = Auth::user();

        // Menampilkan halaman edit profil dengan data pengguna
        return view('profile', compact('user'));
    }

    public function update(Request $request)
    {
        // Mendapatkan data pengguna yang sedang login
        $user = Auth::user();

        // Validasi input dari form
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

        // Jika ada foto profil baru, upload dan simpan
        if ($request->hasFile('photo')) {
            // Hapus foto lama jika ada
            if ($user->photo && Storage::exists('public/' . $user->photo)) {
                Storage::delete('public/' . $user->photo);
            }

            // Simpan foto baru
            $path = $request->file('photo')->store('profile_photos', 'public');
            $user->photo = $path;
        }

        // Simpan perubahan data pengguna
        $user->save();

        // Redirect ke halaman profil setelah update
        return redirect()->route('profile')->with('success', 'Profile updated successfully');
    }
}
