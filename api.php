<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\FileController;
use App\Http\Controllers\Api\FolderController;
use App\Http\Controllers\Api\SearchController;
use App\Http\Controllers\Api\ProfileController; // Ensure this class exists in the specified namespace
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\DocumentController;
use App\Http\Controllers\Api\StarredController;

// Rute untuk login
// Route::post('/login', [AuthController::class, 'login']);
// Route::post('/login', [UserController::class, 'loginApi']);
// Route::middleware('auth:sanctum')->get('/logout', [UserController::class, 'logoutApi']);

//buatlah  route untuk registrasi menggunakan  sanctum
// Route::middleware ('auth:sanctum')->post('/register', [UserController::class, 'register']);
// Route::middleware ('auth:sanctum')->get('/register', [UserController::class, 'register']);
// Route::middleware ('auth:sanctum')->put('/register', [UserController::class, 'register']);
// Route tanpa autentikasi untuk register


Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile/photo', [ProfileController::class, 'deletePhoto'])->name('profile.deletePhoto');
    Route::post('/logout', [ProfileController::class, 'logout'])->name('logout');
Route::post('/register', [UserController::class, 'register']);


Route::middleware('auth:sanctum')->get('/users/{id}', [UserController::class, 'show'])->name('users.show');
Route::middleware('auth:sanctum')->put('/users/{id}', [UserController::class, 'update'])->name('users.update');
Route::middleware('auth:sanctum')->delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
Route::post('/login', [UserController::class, 'loginApi'])->name('login.api');
Route::get('/login', [UserController::class, 'loginApi'])->name('login.api');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/profile', [UserController::class, 'profile']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/profile', [UserController::class, 'profile']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::put('/profile', [UserController::class, 'profile']);
});

Route::middleware('auth:sanctum')->post('/logout', [UserController::class, 'logoutApi'])->name('logout.api');

// Rute untuk mendapatkan user yang sedang login
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('documents')->group(function () {
    // GET: Menampilkan semua dokumen (folders & files)
    Route::get('/', [DocumentController::class, 'index']);

    // DELETE: Menghapus file berdasarkan ID
    Route::delete('/files/{id}', [DocumentController::class, 'destroyFile']);

    // DELETE: Menghapus folder berdasarkan ID
    Route::delete('/folders/{id}', [DocumentController::class, 'destroyFolder']);
});


Route::prefix('files')->group(function () {
    // GET: Menampilkan Semua File
    Route::get('/', [FileController::class, 'index']);
    
    // GET: Menampilkan File Berdasarkan Nama
    Route::get('/{name}', [FileController::class, 'show']);
    
    // PUT: Mengupdate File
    Route::put('/{name}', [FileController::class, 'update']);
    
    // DELETE: Menghapus File
    Route::delete('/{name}', [FileController::class, 'destroy']);
});



Route::prefix('folders')->group(function () {
    // GET: Menampilkan Semua Folder
    Route::get('/', [FolderController::class, 'index']);
    
    // GET: Menampilkan Folder Berdasarkan ID
    Route::get('/{id}', [FolderController::class, 'show']);
    
    // PUT: Mengupdate Folder
    Route::put('/{id}', [FolderController::class, 'update']);
    
    // DELETE: Menghapus Folder
    Route::delete('/{id}', [FolderController::class, 'destroy']);
});


Route::prefix('files')->group(function () {
    // GET: Menampilkan Semua File yang Diberi Bintang
    Route::get('/starred', [StarredController::class, 'showStarred']);

    // PUT: Mengubah status bintang pada file
    Route::put('/{id}/toggle-star', [StarredController::class, 'toggleStar']);

    // DELETE: Menghapus file berdasarkan ID
    Route::delete('/{id}', [StarredController::class, 'destroy']);
});
// Rute untuk pencarian file
// Route::middleware('auth:sanctum')->get('/search', [SearchController::class, 'search']);

// // Rute untuk pengelolaan folder
// Route::middleware('auth:sanctum')->get('/folders', [FolderController::class, 'index']);
// Route::middleware('auth:sanctum')->get('/folders/{folder}', [FolderController::class, 'show']);
// Route::middleware('auth:sanctum')->post('/folders', [FolderController::class, 'store']);
// Route::middleware('auth:sanctum')->put('/folders/{folder}', [FolderController::class, 'update']);
// Route::middleware('auth:sanctum')->delete('/folders/{folder}', [FolderController::class, 'destroy']);

// // Rute untuk pengelolaan file
// Route::middleware('auth:sanctum')->get('/files', [FileController::class, 'index']);
// Route::middleware('auth:sanctum')->get('/files/{file}', [FileController::class, 'show']);
// Route::middleware('auth:sanctum')->post('/files', [FileController::class, 'store']);
// Route::middleware('auth:sanctum')->put('/files/{file}', [FileController::class, 'update']);
// Route::middleware('auth:sanctum')->delete('/files/{file}', [FileController::class, 'destroy']);


// Route::middleware('auth:sanctum')->get('/profile', [ProfileController::class, 'show']);  // GET untuk show profile
// Route::middleware('auth:sanctum')->post('/profile', [ProfileController::class, 'update']); // POST untuk update profile

