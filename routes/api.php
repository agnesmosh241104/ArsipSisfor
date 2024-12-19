<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\FileController;
use App\Http\Controllers\Api\FolderController;
use App\Http\Controllers\Api\SearchController;
use App\Http\Controllers\Api\ProfileController; // Ensure this class exists in the specified namespace
use App\Http\Controllers\DocumentController;

// Rute untuk login
Route::post('/login', [AuthController::class, 'login']);

Route::post('/register', [AuthController::class, 'register']);

Route::middleware(('auth:sanctum'))->group(function () {
    Route::prefix('users')->controller('UserController::class')->group(function () {
        Route::get('/', 'index');
    });
});
//rute create new
Route::middleware('auth:sanctum')->post('/create-new', [FileController::class, 'store']);

//rute untuk starred
Route::middleware('auth:sanctum')->get('/starred', [FileController::class, 'starred']);

//rute untuk documents
Route::middleware('auth:sanctum')->get('/documents', [DocumentController::class, 'documents']);

// Rute untuk pencarian file
Route::middleware('auth:sanctum')->get('/search', [SearchController::class, 'search']);

// Rute untuk pengelolaan folder
Route::middleware('auth:sanctum')->get('/folders', [FolderController::class, 'index']);
Route::middleware('auth:sanctum')->get('/folders/{folder}', [FolderController::class, 'show']);
Route::middleware('auth:sanctum')->post('/folders', [FolderController::class, 'store']);
Route::middleware('auth:sanctum')->put('/folders/{folder}', [FolderController::class, 'update']);
Route::middleware('auth:sanctum')->delete('/folders/{folder}', [FolderController::class, 'destroy']);

// Rute untuk pengelolaan file
Route::middleware('auth:sanctum')->get('/files', [FileController::class, 'index']);
Route::middleware('auth:sanctum')->get('/files/{file}', [FileController::class, 'show']);
Route::middleware('auth:sanctum')->post('/files', [FileController::class, 'store']);
Route::middleware('auth:sanctum')->put('/files/{file}', [FileController::class, 'update']);
Route::middleware('auth:sanctum')->delete('/files/{file}', [FileController::class, 'destroy']);

Route::middleware('auth:sanctum')->get('/profile', [ProfileController::class, 'show']);