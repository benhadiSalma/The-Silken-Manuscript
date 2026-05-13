<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\EnsureUserIsAdmin;

// ==========================================
// 1. PUBLIC ROUTES (Accessible to everyone)
// ==========================================
Route::get('/', [PageController::class, 'landing'])->name('landing');
Route::get('/index', [PageController::class, 'index'])->name('index');

// ==========================================
// 2. AUTHENTICATED USERS (Scribes)
// ==========================================
Route::middleware('auth')->group(function () {
    
    // Profile Management
    Route::get('/profile', function () { return view('profile'); })->name('profile');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/my-profile', function () { return view('profile-show'); })->name('profile.show');

    
    Route::post('/books/{book}/toggle-favorite', [FavoriteController::class, 'toggle'])->name('books.toggle-favorite');

});

// ==========================================
// 3. ADMIN USERS (Grand Archivists)
// ==========================================
Route::middleware(['auth', EnsureUserIsAdmin::class])->group(function () {
    
    // Book Management (Tes anciennes routes admin)
    Route::get('/books/create', [PageController::class, 'create'])->name('books.create');
    Route::post('/books', [PageController::class, 'store'])->name('books.store');

    // Admin Dashboard & User Management
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
        Route::post('/users/{user}/toggle', [AdminController::class, 'toggleRole'])->name('users.toggle');
        Route::post('/users/create', [AdminController::class, 'store'])->name('users.store');
    });

});

// Authentication routes (Breeze)
require __DIR__ . '/auth.php';