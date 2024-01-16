<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeriesController;


Route::get('/series', [SeriesController::class, 'index']);
Route::get('/series/adicionar', [SeriesController::class, 'create']);
Route::post('/series/salvar', [SeriesController::class, 'store']);

// Route::get('/debug', [SeriesController::class, 'debug']);