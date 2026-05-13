<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FavoriteController;

// 1. PUBLIC ROUTES (Anyone can access these, logged in or not)
Route::get('/', [PageController::class, 'landing'])->name('landing');
Route::get('/index', [PageController::class, 'index'])->name('index');

// 2. AUTHENTICATED USERS (Normal Scribes)
Route::middleware('auth')->group(function () {

});

// 3. ADMIN USERS (Head Scribes)
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/books/create', [PageController::class, 'create'])->name('books.create');
    Route::post('/books', [PageController::class, 'store'])->name('books.store');
});


require __DIR__ . '/auth.php';

Route::get('/profile', function () {
    return view('profile');
})->name('profile')->middleware('auth');
Route::post('/profile/update', [App\Http\Controllers\ProfileController::class, 'update'])
    ->name('profile.update')
    ->middleware('auth');

    Route::get('/my-profile', function () {
    return view('profile-show');
})->name('profile.show')->middleware('auth');



Route::post('/books/{book}/favorite', [FavoriteController::class, 'toggle'])
    ->middleware('auth')
    ->name('books.favorite');