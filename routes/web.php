<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\EnsureUserIsAdmin;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ContactController;

// --- PUBLIC ---
Route::get('/', [PageController::class, 'landing'])->name('landing');
Route::get('/index', [PageController::class, 'index'])->name('index');
Route::get('/rules', function () {
    return view('rules');
})->name('rules.index');
Route::get('/faq', [FaqController::class, 'index'])->name('faq.index');
Route::get('/contact', [ContactController::class, 'create'])->name('contact.create');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Public Chronicles
Route::get('/chronicles', [NewsController::class, 'index'])->name('news.index');
Route::get('/chronicles/{news}', [NewsController::class, 'show'])->name('news.show');

// --- AUTHENTICATED ---
Route::middleware('auth')->group(function () {
    Route::get('/profile', function () {
        return view('profile');
    })->name('profile');

    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('/my-profile', function () {
        return view('profile-show');
    })->name('profile.show');

    Route::post('/books/{book}/toggle-favorite', [FavoriteController::class, 'toggle'])
        ->name('books.toggle-favorite');
});

// --- ADMIN ---
Route::middleware(['auth', EnsureUserIsAdmin::class])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // Dashboard
        Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

        // Book Management
        Route::get('/books/create', [PageController::class, 'create'])->name('books.create');
        Route::post('/books', [PageController::class, 'store'])->name('books.store');

        // News Management
        Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
        Route::post('/news', [NewsController::class, 'store'])->name('news.store');
        Route::get('/news/{news}/edit', [NewsController::class, 'edit'])->name('news.edit');
        Route::put('/news/{news}', [NewsController::class, 'update'])->name('news.update');
        Route::delete('/news/{news}', [NewsController::class, 'destroy'])->name('news.destroy');

        // Users
        Route::post('/users/{user}/toggle', [AdminController::class, 'toggleRole'])->name('users.toggle');
        Route::post('/users/create', [AdminController::class, 'store'])->name('users.store');

        // FAQ Management
        Route::get('/faqs/create', [FaqController::class, 'create'])->name('faqs.create');
        Route::post('/faqs', [FaqController::class, 'store'])->name('faqs.store');
        Route::get('/faqs/{faq}/edit', [FaqController::class, 'edit'])->name('faqs.edit');
        Route::put('/faqs/{faq}', [FaqController::class, 'update'])->name('faqs.update');
        Route::delete('/faqs/{faq}', [FaqController::class, 'destroy'])->name('faqs.destroy');
    });

require __DIR__ . '/auth.php';