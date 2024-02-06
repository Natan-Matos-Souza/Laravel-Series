<?php

use App\Http\Controllers\Api\SeriesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('/series', SeriesController::class);

/**
 *  @get  /api/series -> show all series
 */

/**
 *  @post  /api/series -> create a series
 */

/**
 *  @get  /api/series/{id} -> show a specific series
 */

/**
 * @put /api/series/{id} -> modify completely a specif series
 */

/**
 * @patch /api/series/{id} -> modify partially a specif series
 */

/**
 * @patch /api/series/{id} -> modify partially a specif series
 */
