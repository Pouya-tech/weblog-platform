<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\SignupController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/Miniapp', function () {
    return view('Miniapp');
});

Route::middleware('guest',)->group(function () {
    Route::get('/sign_up', [SignupController::class, 'index'])->name('signup');
    Route::post('/sign_up', [SignupController::class, 'store'])->name('signup.store');
});

Route::get('/dashboard', DashboardController::class)
    ->middleware('auth')
    ->name('dashboard');

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'store']);
});

Route::post('/logout', [LoginController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

Route::prefix('admin')->group(function () {
    // Categories
    Route::resource('categories', CategoryController::class)
        ->middleware('can:manage-categories')
        ->except(['show']);

    // Tags
    Route::resource('tags', TagController::class)
        ->middleware('can:manage-tags')
        ->except(['show']);

    // Posts
    Route::resource('posts', PostController::class)
        ->middleware('can:manage-posts');
});
