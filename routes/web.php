<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;

//route yang bisa diakses ketika user belum login
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/auth', [AuthController::class, 'auth'])->name('auth');
});

//route yang bisa diakses ketika user sudah login
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::middleware('role:admin')->prefix('admin')->name('admin.')->group(function () {
        Route::get('/users', [UserController::class, 'index'])->name('users');
        Route::get('/users/create', [UserController::class, 'create'])->name ('user.craete');
        Route::get('/users/store',[UserController::class, 'store'])->name('user.store');
        Route::get('/users/edit/{user}',[UserController::class, 'edit'])->name('user.edit');
        Route::get('/users/update/{user}',[UserController::class, 'update'])->name('users.update');
        Route::get('/users/destroy/{user}',[UserController::class, 'destroy'])->name('users.destroy');
    });
});