<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Episode;
use App\Models\Serie;
use Illuminate\Http\Request;

class EpisodesController extends Controller
{
    public function show(Request $request, Serie $series)
    {
        return $series->through('seasons')->has('episodes')->get(); //Through relationship.
    }

    public function update(Request $request, Episode $episodes)
    {
        dd($episodes->watched);
    }
}
