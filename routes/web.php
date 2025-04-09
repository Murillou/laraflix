<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\LoginController::class, 'create'])->name('login.create');
Route::post('/', [\App\Http\Controllers\LoginController::class, 'store'])->name('login.store');

Route::resource('register', \App\Http\Controllers\RegisterController::class)->only('create', 'store');

Route::resource('profiles', \App\Http\Controllers\ProfileController::class)->only('index');
Route::get('/profiles/select', [\App\Http\Controllers\ProfileController::class, 'select'])->name('profiles.select');
