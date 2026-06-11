<?php
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\AuthController;

// Rute Publik (Tanpa Login)
Route::post('/login', [AuthController::class, 'getToken']);
Route::get('/product', [ProductController::class, 'index']);
Route::get('/product/{id}', [ProductController::class, 'show']);

// Rute Privat (Wajib pakai Bearer Token)
Route::middleware('auth:sanctum')->group(function () {
    // CRUD Product
    Route::post('/product', [ProductController::class, 'store']);
    Route::put('/product/{id}', [ProductController::class, 'update']);
    Route::delete('/product/{id}', [ProductController::class, 'destroy']);

    // CRUD Category (Tugas Praktikum 1)
    Route::apiResource('category', CategoryController::class);
});