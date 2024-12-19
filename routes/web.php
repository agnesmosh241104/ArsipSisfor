<?php

use App\Http\Controllers\ActivityController;
use Illuminate\Support\Facades\Route;
// routes/web.php
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\NewAuthorManager;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FolderController;
use App\Http\Controllers\Auth\SocialiteController;

//  require __DIR__.'/auth.php';


Route::get('/', function () {
    return view('login');
})->name('login');

// dashboard
Route::get('/dashboard', function() {
    return view('dashboard');
})->name('dashboard');

Route::get('/login', [NewAuthorManager::class , 'login'])->name('login');
Route::post('/login', [NewAuthorManager::class , 'loginPost'])->name('login.post');

Route::get('/registrasi', [NewAuthorManager::class , 'registrasi'])->name('registrasi');
Route::post('/registrasi', [NewAuthorManager::class , 'registrasiPost'])->name('registrasi.post');

// Route::get('/dokumen-akademik', [DocumentController::class, 'dokumenAkademik'])->name('dokumen-akademik');
// Route::get('/upload-list/{type}', [DocumentController::class, 'showUploadList'])->name('upload-list');

Route::get('/personal', function () {
    return view('personal'); // Route ke dokumen.blade.php
})->name('personal');
Route::get('/manage', function () {
    return view('manage'); // Route ke dokumen.blade.php
})->name('manage');
 
// Menangani logout
Route::get('/logout', [NewAuthorManager::class, 'logout'])->name('logout');
Route::post('/logout', [NewAuthorManager::class, 'logout'])->name('logout.post');


Route::get('/profile', [ProfileController::class, 'edit'])->name('profile');
Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
// rute untuk profil.edit

// Di routes/web.php
Route::get('/search', [SearchController::class, 'search'])->name('search');

// Halaman Form Create New
Route::get('/create-new', function () {
    return view('create-new');
})->name('create-new');

// Aksi untuk Create New
Route::post('/create-new', [FileController::class, 'createNew'])->name('create-new-action');

// Halaman Form Upload File
Route::get('/upload-file', function () {
    return view('upload-file');
})->name('upload-file');

Route::get('/documents', function () {
    return view('Documents');
})->name('Documents');

// Aksi untuk Upload File
Route::post('/upload-file', [FileController::class, 'uploadFile'])->name('upload-file-action');

// Rute lain yang relevan
Route::get('/recent', [FileController::class, 'recent'])->name('files.recent');

Route::get('/trash', [FileController::class, 'trash'])->name('files.trash');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::post('/create-new-action', [FolderController::class, 'store'])->name('create-new-action');
Route::post('/create-folder', [FolderController::class, 'store'])->name('create-new-action');
Route::get('/folders/{category}/{folder}', [FolderController::class, 'show'])->name('folders.show');
// Route untuk menampilkan daftar folder berdasarkan kategori
Route::get('/folders/{category}', [FolderController::class, 'index'])->name('folders.index');
Route::post('/upload-file-action', [FileController::class, 'store'])->name('upload-file-action');
//upload-file ke rute folders.show
Route::get('/folders/{category}/{folder}/upload-file', [FileController::class, 'showUploadForm'])->name('folders.upload-file');
//buatkan rute ke folders.show dari upload-file
Route::get('/folders/{category}/{folder}/upload-file', [FileController::class, 'showUploadForm'])->name('folders.upload-file');
Route::post('folders/{category}/{folder}/upload', [FolderController::class, 'uploadFile'])->name('files.upload');
// Route::delete('folders/{category}/{folder}/files/{file}', [FileController::class, 'destroy'])->name('files.destroy');
Route::get('/starred', [FileController::class, 'showStarred'])->name('files.starred');
Route::post('/toggle-starred/{id}', [FileController::class, 'toggleStarred'])->name('files.toggle-starred');
Route::get('/documents', [DocumentController::class, 'index'])->name('documents.index');
Route::get('/folders/{category}/{folder}', [FolderController::class, 'show'])->name('folders.show');
Route::get('/search', [SearchController::class, 'search'])->name('search');
Route::delete('/folders/{folder}', [FolderController::class, 'destroy'])->name('folders.destroy');

// Route::get('/files/{file}', [FileController::class, 'show'])->name('files.show');
// Route::delete('/files/{file}', [FileController::class, 'destroy'])->name('files.destroy');

// Rute untuk menampilkan halaman edit profil
// Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');

// Rute untuk memperbarui profil
// Route::post('/profile/edit', [ProfileController::class, 'update'])->name('profile.update');

Route::get('/files', [FileController::class, 'index'])->name('files.index');
Route::post('/files/upload', [FileController::class, 'upload'])->name('files.upload');
// Update route untuk file berdasarkan nama file
Route::get('/files/{file}', [FileController::class, 'show'])->name('files.show');
Route::put('/files/{filename}', [FileController::class, 'update'])->name('files.update');
Route::delete('/files/{file}', [FileController::class, 'destroy'])->name('files.destroy');
//hapus file dengan kategori

Route::post('folders/{category}/{folder}/files', [FileController::class, 'store'])->name('files.store');

// Route::get('/trash', [FileController::class, 'trash'])->name('files.trash');
// Route::post('/trash/restore/{id}', [FileController::class, 'restoreFromTrash'])->name('restore-from-trash');
// Route::delete('/trash/delete/{id}', [FileController::class, 'deletePermanently'])->name('delete-file');

Route::post('/files/{file}/toggle-star', [FileController::class, 'toggleStar'])->name('files.toggle-star');