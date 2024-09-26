<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route untuk halaman Home
Route::get('/', function () {
    return view('home', ['name' => 'Bronson Siallagan']);
});
