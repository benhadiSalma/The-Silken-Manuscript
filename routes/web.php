
<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

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

require __DIR__.'/auth.php';