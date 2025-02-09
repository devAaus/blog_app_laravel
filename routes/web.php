<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BlogController::class, 'index']);
Route::middleware('auth')->group(function () {
    Route::get('/blogs/create', [BlogController::class, 'create']);
    Route::post('/blogs', [BlogController::class, 'store']);
});
Route::get('/blogs/{blog:slug}', [BlogController::class, 'show'])->name('blogs.show');


// authentication routes
Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisteredUserController::class, 'create']);
    Route::post('/register', [RegisteredUserController::class, 'store']);

    Route::get('/login', [SessionController::class, 'create'])->name('login');
    Route::post('/login', [SessionController::class, 'store']);
});

Route::delete('/logout', [SessionController::class, 'destroy'])->middleware('auth');


Route::get('/users/dashboard', [SessionController::class, 'index'])->middleware('auth');

Route::get('/users/{user:userTag}', [UserProfileController::class, 'show'])->name('user.show');
