<?php

use Illuminate\Support\Facades\Route;

Route::resource('/', \App\Http\Controllers\LoginController::class);

Route::resource('register', \App\Http\Controllers\RegisterController::class)->only('create', 'store');
