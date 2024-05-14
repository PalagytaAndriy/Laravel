<?php

use App\Http\Controllers\GenreController;
use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

Route::get('genres', [GenreController::class, 'index'])->name('genres.index');
Route::get('genres/{id}', [GenreController::class, 'show'])->name('genres.show');
Route::get('movies', [MovieController::class, 'index'])->name('movies.index');
Route::get('movies/{id}', [MovieController::class, 'show'])->name('movies.show');
