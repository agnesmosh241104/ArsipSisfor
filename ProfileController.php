<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function editProfile()
    {
        $user = Auth::user();
        return view('profile', compact('user'));
    }

    public function updateProfile(Request $request) 
    { 
        // Ambil user yang sedang login
        $user = Auth::user();

        // Validasi inputan, jika diperlukan
        $request->validate([
            'name' => 'required|string|max:255', // Validasi nama
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id, // Validasi email
            'password' => 'nullable|string|min:6|confirmed', // Validasi password jika diisi
        ]);

        // Update informasi user
        $user->name = $request->input('name');
        $user->email = $request->input('email'); 
        
        // Jika password diinputkan, update password
        if ($request->filled('password')) {
            $user->password = bcrypt($request->input('password'));
        }

        // Simpan perubahan
        // $user->save();

        return redirect()->route('profile.edit')->with('success', 'Profile updated successfully');
    }

    public function show() 
    { 
        $user = Auth::user();
        return view('profile', compact('user'));
    }

    public function updateContact(Request $request)
    {
        // Validasi data masukan
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . auth()->id(),
            'city' => 'required|string|max:255',
            'dob' => 'required|date',
            'gender' => 'required|string',
            'address' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Sesuaikan ukuran maksimal sesuai kebutuhan
        ]);

        $user = auth()->user();
        
        // Update informasi kontak pengguna
        $user->first_name = $validatedData['first_name'];
        $user->last_name = $validatedData['last_name'];
        $user->username = $validatedData['username'];
        $user->city = $validatedData['city'];
        $user->dob = $validatedData['dob']; 
        $user->gender = $validatedData['gender'];
        $user->address = $validatedData['address'];

        // Proses upload foto jika ada
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public'); // Simpan di direktori public/photos
            $user->photo = $photoPath; // Simpan path foto dalam profil pengguna
        }

        $user->save();

        return redirect()->back()->with('success', 'Personal information updated successfully.');
    }
}
