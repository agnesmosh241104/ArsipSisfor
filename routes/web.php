<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewAuthorManager;
use App\Http\Controllers\FileUploadController; 

Route::get('/', function () {
    return view('home'); // Route ke home.blade.php
})->name('home');

// Route::get('/', function () {
//     return view('kompetisi'); // Route ke home.blade.php
// })->name('kompetisi');      

// Route::get('/kompetisi', [NewAuthorManager::class, 'kompetisi'])->name('kompetisi');


Route::get('/kompetisi', function () {
    return view('kompetisi'); // Route ke dokumen.blade.php
})->name('kompetisi');

Route::get('/dokumen', function () {
    return view('dokumen'); // Route ke dokumen.blade.php
})->name('dokumen'); 


Route::get('/laporan', function () {
    return view('laporan'); // Route ke dokumen.blade.php
})->name('laporan'); 

Route::get('/proyek', function () {
    return view('proyek'); // Route ke dokumen.blade.php
})->name('proyek');

Route::get('/kepanitiaan', function () {
    return view('kepanitiaan'); // Route ke dokumen.blade.php
})->name('kepanitiaan');

Route::get('/personal', function () {
    return view('personal'); // Route ke dokumen.blade.php
})->name('personal');

Route::get('/manage', function () {
    return view('manage'); // Route ke dokumen.blade.php
})->name('manage');


// Route::get('/kompetisi', function () {
//     return view('kompetisi');
// });

Route::post('/create-proyek', [NewAuthorManager::class, 'store'])->name('create-proyek');





Route::get('/upload', [FileUploadController::class, 'showUploadForm']);
Route::post('/upload', [FileUploadController::class, 'uploadFile']);




Route::get('/login', [NewAuthorManager::class , 'login'])->name('login');
Route::post('/login', [NewAuthorManager::class , 'loginPost'])->name('login.post');

Route::get('/registrasi', [NewAuthorManager::class , 'registrasi'])->name('registrasi');
Route::post('/registrasi', [NewAuthorManager::class , 'registrasiPost'])->name('registrasi.post');

Route::get('/logout', [NewAuthorManager::class , 'logout'])->name('logout');
Route::post('/logout', [NewAuthorManager::class , 'logout'])->name('logout');

// Menangani logout
Route::get('/logout', [NewAuthorManager::class, 'logout'])->name('logout');
Route::post('/logout', [NewAuthorManager::class, 'logout'])->name('logout.post');



use Illuminate\Support\Facades\Auth;

// Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');


Route::get('/layout', function () {
    return view('layout'); // Route ke dokumen.blade.php
})->name('layout');

Route::get('/login', function () {
    return view('login'); // Route ke dokumen.blade.php
})->name('login');

// // Menangani penyimpanan proyek (POST request)
// function storeProyek(Request $request) {
//     $request->validate([
//         'nama' => 'required|string|max:255',
//         'deskripsi' => 'required|string',
//     ]);

//     // Logika untuk menyimpan proyek ke database
//     $proyek = new Proyek(); // Pastikan Anda mengimpor model Proyek
//     $proyek->nama = $request->nama;
//     $proyek->deskripsi = $request->deskripsi;
//     $proyek->save();
// }

