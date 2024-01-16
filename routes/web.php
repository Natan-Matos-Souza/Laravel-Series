<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeriesController;


/**
 * main app route
 */

Route::resource('/series', SeriesController::class)
->only(['index', 'create', 'store', 'destroy']);