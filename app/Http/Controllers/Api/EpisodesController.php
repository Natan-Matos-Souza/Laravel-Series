<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Episode;
use App\Models\Serie;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class EpisodesController extends Controller
{
    public function show(Serie $series): JsonResponse
    {
        return response()->json(
            $series->through('seasons')->has('episodes')->get()
        );
    }

    public function update(Request $request, Episode $episodes): void
    {
        $episodes->fill($request->all());

        $episodes->save();
    }
}
