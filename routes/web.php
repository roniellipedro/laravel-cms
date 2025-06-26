<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingController;
// use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

Route::middleware('auth')->prefix('painel')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('painel');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update/{id}', [ProfileController::class, 'update'])->name('profile.update');

    Route::put('/settings/save', [SettingController::class, 'save'])->name('settings.save');
    Route::get('/settings', [SettingController::class, 'index'])->name('settings');

    Route::delete('/pages/destroy/{id}', [PageController::class, 'destroy'])->name('pages.destroy');
    Route::put('/pages/update/{id}', [PageController::class, 'update'])->name('pages.update');
    Route::get('/pages/edit/{id}', [PageController::class, 'edit'])->name('pages.edit');
    Route::post('/pages/store', [PageController::class, 'store'])->name('pages.store');
    Route::get('/pages/create', [PageController::class, 'create'])->name('pages.create');
    Route::get('/pages', [PageController::class, 'index'])->name('pages');
});

Route::middleware('can:edit-users')->prefix('painel')->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('painel.users');
    Route::delete('/users/destroy/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::put('/users/update/{id}', [UserController::class, 'update'])->name('users.update');
    Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
});

require __DIR__ . '/auth.php';
