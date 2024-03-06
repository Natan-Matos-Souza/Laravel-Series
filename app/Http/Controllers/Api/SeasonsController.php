<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Serie;

class SeasonsController extends Controller
{
    public function show(Serie $series)
    {
        return response()->json($series->seasons);
    }
}
