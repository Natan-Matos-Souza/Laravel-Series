<?php

namespace App\Http\Controllers\Api;
use App\Models\Serie;
use App\Repositories\EloquentSeriesRepository;
use Illuminate\Http\Request;

class SeriesController
{
    public function index()
    {
        return Serie::all();
    }

    public function store(Request $request, EloquentSeriesRepository $repository)
    {
        $repository->save($request);
        return response(status: 201); //Named parameters.

    }

    public function show(Request $request, int $id) // Serie $series)
    {
//        $serie = Serie::findOrFail($id)
//            ->with('seasons.episodes')
//            ->where('id', '=', $id)
//            ->first();

        dd(Serie::findOrFail($id));

        return response()->json($serie);
    }

    public function update(Request $request, Serie $series)
    {
        $series->fill($request->all());
        $series->save();


    }

    public function destroy(Request $request, Serie $serie)
    {
        $serie->delete();
    }
}


