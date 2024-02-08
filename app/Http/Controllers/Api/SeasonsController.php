<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Serie;
use Illuminate\Http\Request;

class SeasonsController extends Controller
{
    public function show(Request $request, Serie $series)
    {
        return response()->json($series->seasons);
    }
}
