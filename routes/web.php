<?php

use App\Http\Controllers\SeasonsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\EpisodesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\LogoutController;


/**
 * main app route
 */

Route::resource('/series', SeriesController::class);

Route::get('/series/{series}/seasons', [SeasonsController::class, 'index'])
    ->name('seasons.index');

Route::get('/seasons/{seasons}/episodes', [EpisodesController::class, 'index'])
    ->name('episodes.index');

Route::post('/seasons/{seasons}/episodes', [EpisodesController::class, 'update'])
    ->name('episodes.store');


Route::resource('/login', LoginController::class)
    ->name('index', 'login')
    ->only(['index', 'store']);

Route::resource('/cadastro', UsersController::class)
    ->only(['index', 'store']);

/**
 * logout route
 */

Route::get('/logout', [LogoutController::class, 'index']);