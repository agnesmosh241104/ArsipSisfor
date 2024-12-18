<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class NewAuthorManager extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function registrasi()
    {
        return view('registrasi');
    }

    // Menangani login (POST request)
    public function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Ambil hanya email dan password dari request
        $credentials = $request->only('email', 'password');

        // Cek kredensial
        if (Auth::attempt($credentials)) {
            return redirect()->intended(route('dashboard')); // Arahkan ke halaman home jika berhasil
        }
        // Jika gagal, kembali ke halaman login dengan pesan error
        return redirect(route('login'))->with('error', 'Login details are not valid');
    }

    // Menangani registrasi (POST request)
    public function registrasiPost(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $user = User::create($data);

        if (!$user) {
            return redirect(route('registrasi'))->with('error', 'Registrasi failed, try again');
        }

        return redirect(route('login'))->with('success', 'Registrasi success');
    }

    // Menangani logout
    public function logout()
    {
        Session::flush(); // Logout dari sesi autentikasi
        Auth::logout(); // Menghapus semua session data
        return redirect()->route('login'); // Redirect ke halaman login
    }
}
