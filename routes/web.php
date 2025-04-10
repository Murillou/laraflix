<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\LoginController::class, 'create'])->name('login');
Route::post('/', [\App\Http\Controllers\LoginController::class, 'store'])->name('login.store');
Route::delete('/', [\App\Http\Controllers\LoginController::class, 'logout'])->name('login.logout');

Route::resource('register', \App\Http\Controllers\RegisterController::class)->only('create', 'store');

Route::get('/profiles/select', [\App\Http\Controllers\ProfileController::class, 'select'])->name('profiles.select');
Route::resource('profiles', \App\Http\Controllers\ProfileController::class);
