<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BlogController::class, 'index']);
Route::middleware('auth')->group(function () {
    Route::get('/blogs/create', [BlogController::class, 'create']);
    Route::post('/blogs', [BlogController::class, 'store']);

    Route::get('/blogs/{blog}/edit', [BlogController::class, 'edit']);
    Route::patch('/blogs/{blog}', [BlogController::class, 'update']);

    Route::delete('/blogs/{blog}', [BlogController::class, 'destroy'])->name('blogs.destroy');
});
Route::get('/blogs/{blog:slug}', [BlogController::class, 'show'])->name('blogs.show');


Route::get('/search', SearchController::class);

// authentication routes
Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisteredUserController::class, 'create']);
    Route::post('/register', [RegisteredUserController::class, 'store']);

    Route::get('/login', [SessionController::class, 'create'])->name('login');
    Route::post('/login', [SessionController::class, 'store']);
});

// Change DELETE to POST for logout route
Route::post('/logout', [SessionController::class, 'destroy'])->middleware('auth');

// User dashboard and profile routes
Route::get('/users/dashboard', [SessionController::class, 'index'])->middleware('auth');
Route::get('/users/{user:userTag}', [UserProfileController::class, 'show'])->name('user.show');
