<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LoginController::class, 'create'])->name('login');
Route::post('/', [LoginController::class, 'store'])->name('login.store');
Route::delete('/', [LoginController::class, 'logout'])->name('login.logout');

Route::resource('register', RegisterController::class)->only('create', 'store');

Route::get('/profiles/select', [ProfileController::class, 'select'])->name('profiles.select');
Route::resource('profiles', ProfileController::class);
