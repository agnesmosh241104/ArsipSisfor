<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewAuthorManager;
use App\Http\Controllers\FileUploadController;






Route::get('/', function () {
    return view('home'); // Route ke home.blade.php
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard'); // Route ke dokumen.blade.php
})->name('dashboard');

Route::get('/dokumen', function () {
    return view('dokumen'); // Route ke dokumen.blade.php
})->name('dokumen');
 


Route::get('/laporan', function () {
    return view('laporan'); // Route ke dokumen.blade.php
})->name('laporan');



Route::get('/upload', [FileUploadController::class, 'showUploadForm']);
Route::post('/upload', [FileUploadController::class, 'uploadFile']);




Route::get('/login', [NewAuthorManager::class , 'login'])->name('login');
Route::post('/login', [NewAuthorManager::class , 'loginPost'])->name('login.post');

Route::get('/registrasi', [NewAuthorManager::class , 'registrasi'])->name('registrasi');
Route::post('/registrasi', [NewAuthorManager::class , 'registrasiPost'])->name('registrasi.post');

// Gunakan POST untuk logout agar lebih aman
Route::post('/logout', [NewAuthorManager::class , 'logout'])->name('logout');


use Illuminate\Support\Facades\Auth;

// Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');


Route::get('/layout', function () {
    return view('layout'); // Route ke dokumen.blade.php
})->name('layout');


