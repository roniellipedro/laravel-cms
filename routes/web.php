<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
// use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

Route::middleware('auth')->group(function () {
    Route::post('/painel/users/store', [UserController::class, 'store'])->name('users.store');
    Route::get('/painel/users/create', [UserController::class, 'create'])->name('users.create');
    Route::get('/painel/users/destroy/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::get('/painel/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
    Route::get('/painel/users', [UserController::class, 'index'])->name('painel.users');
    Route::get('/painel', [AdminController::class, 'index'])->name('painel');
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
