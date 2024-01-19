<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeriesController;


/**
 * main app route
 */

Route::resource('/series', SeriesController::class);

Route::get('/debug/{series}', [SeriesController::class, 'debug']);

/**
 * Author: Natan Matos
 * Version: 1.0
 * Description: a simple project made with PHP & Laravel <3
 */