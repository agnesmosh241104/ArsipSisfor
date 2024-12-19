<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\AHttp\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        $users = $users->map(function ($user) {
            return [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'links' => [
                    ['rel' => 'self', 'href' => route('users.show', $user->id)],  // Link ke detail pengguna
                    ['rel' => 'update', 'href' => route('users.update', $user->id)],  // Link untuk mengupdate pengguna
                    ['rel' => 'delete', 'href' => route('users.destroy', $user->id)],  // Link untuk menghapus pengguna
                ]
            ];
        });

        return response()->json([
            'users' => $users,
            'links' => [
                ['rel' => 'create', 'href' => route('users.store')],  // Link untuk membuat pengguna baru
                ['rel' => 'self', 'href' => route('users.index')]   // Link ke daftar pengguna itu sendiri
            ]
        ]);
    }

    public function loginApi(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $user = User::where('email', $request['email'])->firstOrFail();
        $token = $user->createToken('token-name')->plainTextToken;

        return response()->json([
            'name' => $user->name,
            'token' => $token,
            'links' => [
                ['rel' => 'self', 'href' => route('users.show', $user->id)],  // Link untuk melihat detail pengguna setelah login
                ['rel' => 'logout', 'href' => route('logout.api')]  // Link untuk logout
            ]
        ]);
    }


    public function logoutApi(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'message' => 'Logout Successful',
            'links' => [
                ['rel' => 'login', 'href' => route('login.api')]  // Link untuk login setelah logout
            ]
        ]);
    }


    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $token = $user->createToken('authToken')->plainTextToken;

        return response()->json([
            'message' => 'User successfully registered',
            'data' => [
                'name' => $user->name,
                'email' => $user->email,
                'links' => [
                    'self' => url("/api/profile"),
                    'update_profile' => url("/api/profile/update"),
                    'logout' => url("/api/logout"),
                    
                ]
            ],
            'token' => $token,
        ], 201);
    }


    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json([
            'message' => 'User successfully logged out'
        ]);
    }
    public function profile(Request $request)
    {
        $user = Auth::user(); // Ambil user yang sedang login

        return response()->json([
            'status' => 'success',
            'data' => [
                'name' => $user->name,
                'email' => $user->email,
                'status' => $user->status ?? 'active',
                'photo_url' => $user->photo ? asset('storage/' . $user->photo) : asset('assets/images/default-profile.jpg'),
                'links' => [
                    'self' => url('/api/profile'),
                    'update_profile' => url('/api/profile/update'),
                    'upload_photo' => url('/api/profile/upload-photo'),
                    'logout' => url('/api/logout'),
                ],
            ],
        ]);
    } 

    
    
} 
