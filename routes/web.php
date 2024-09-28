<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home'); // Route ke home.blade.php
})->name('home');

Route::get('/dokumen', function () {
    return view('dokumen'); // Route ke dokumen.blade.php
})->name('dokumen');
