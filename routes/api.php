<?php

use App\Http\Controllers\Api\DebugController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\SeriesController;
use App\Http\Controllers\Api\TestController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SeasonsController;
use App\Http\Controllers\Api\EpisodesController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function() {
    Route::apiResource('/series', SeriesController::class);
    Route::get('/series/{series}/seasons', [SeasonsController::class, 'show']);
    Route::get('/series/{series}/episodes', [EpisodesController::class, 'show']);
    Route::put('/episodes/{episodes}/watched', [EpisodesController::class, 'update']);
    Route::get('/debug', [DebugController::class, 'debug']);
    Route::get('/test', [TestController::class, 'test']);
});

Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/cadastrar', [UserController::class, 'store']);
Route::delete('/user/{users}', [UserController::class, 'destroy']);










