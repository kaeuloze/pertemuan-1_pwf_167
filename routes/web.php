<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ProductController;  // <-- Wajib ditambahkan
use App\Http\Controllers\CategoryController; // <-- Wajib ditambahkan
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/about', [AboutController::class, 'index'])
    ->middleware(['auth'])
    ->name('about');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Group Middleware Auth untuk fitur utama aplikasi
Route::middleware('auth')->group(function () {

    // Route Product
    // Kita gunakan Route::resource agar rapi. 1 baris ini otomatis mewakili 7 route:
    // index, create, store, show, edit, update, dan destroy.
    // Keamanannya (Policy) sudah diatur di dalam ProductController.
    Route::resource('product', ProductController::class);

    // Route Category
    // Kita pasang middleware 'can:manage-product' (Gate) di sini.
    // Jika user biasa mencoba mengetik /category di URL, akan langsung 403 Forbidden.
    Route::resource('category', CategoryController::class)->middleware('can:manage-product');

});

require __DIR__.'/auth.php';