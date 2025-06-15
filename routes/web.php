<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

Route::prefix('painel')->group(function () {
    Route::get('/', [AdminController::class, 'index']);
});
