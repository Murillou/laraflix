<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LoginController::class, 'create'])->name('login');
Route::post('/', [LoginController::class, 'store'])->name('login.store');
Route::delete('/', [LoginController::class, 'logout'])->name('login.logout');

Route::resource('register', RegisterController::class)->only('create', 'store');

Route::get('/profiles/select', [ProfileController::class, 'select'])->name('profiles.select');
Route::resource('profiles', ProfileController::class);

Route::get('/profiles/{profile}/movies', [MovieController::class, 'index'])->name('movies.index');
Route::get('/profiles/{profile}/movies/{movieId}', [MovieController::class, 'show'])->name('movies.show');
Route::post('/profiles/{profile}/movies/{movieId}/favorite', [MovieController::class, 'addToFavorites'])->name('movies.favorite');
Route::get('/profiles/{profile}/favorites', [MovieController::class, 'favorites'])->name('movies.favorites');
