<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::put('users/{user}/profile/update', [UserController::class, 'update'])->name('user.update');
    Route::delete('/users/{user}/destroy', [UserController::class, 'destroy'])->name('user.destroy');
});

Route::middleware('role:admin')->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
});

Route::middleware('can:view,user')->group(function () {
    Route::get('/users/{user}/profile', [UserController::class, 'show'])->name('user.show');
});