<?php

use Illuminate\Support\Facades\Route;
// routes/web.php
use App\Http\Controllers\DocumentController;
// use App\Http\Controllers\UploadController;

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

// Route for Dokumen Akademik
Route::get('/dokumenAkademik', [DocumentController::class, 'dokumenAkademik'])->name('dokumen-akademik');

// Route for Laporan Magang dan KP
Route::get('/laporanMagang', [DocumentController::class, 'laporanMagang'])->name('laporan-magang');

// Route for Dokumen Kompetisi
Route::get('/dokKompetisi', [DocumentController::class, 'dokKompetisi'])->name('dokumen-kompetisi');

// Route for Dokumen Kepanitiaan
Route::get('/dokKepanitiaan', [DocumentController::class, 'dokKepanitiaan'])->name('dokumen-kepanitiaan');

Route::get('/dokumen-akademik', [DocumentController::class, 'index'])->name('dokumen-akademik');
Route::get('/dokumen-akademik/new-folder', [DocumentController::class, 'createNewFolder'])->name('new-folder');
Route::get('/dokumen-akademik/upload-folder', [DocumentController::class, 'uploadFolder'])->name('upload-folder');
Route::get('/dokumen-akademik/upload-file', [DocumentController::class, 'uploadFile'])->name('upload-file');