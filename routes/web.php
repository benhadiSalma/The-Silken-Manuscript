
<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'landing'])->name('landing');
Route::get('/index', [PageController::class, 'index'])->name('index');
Route::get('/books/create', [PageController::class, 'create'])->name('books.create');
Route::post('/books', [PageController::class, 'store'])->name('books.store');