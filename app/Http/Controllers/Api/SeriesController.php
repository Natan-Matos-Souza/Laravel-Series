<?php

namespace App\Http\Controllers\Api;
use App\Models\Serie;
use App\Repositories\SeriesRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SeriesController
{
    public function index(Request $request)
    {
        $serie = $request->query('name');
        $query = Serie::query();

        if ($serie) $query = $query->where('name', '=', $serie);

        return response()->json(
            $query->paginate(2)
        );

    }

    public function store(Request $request, SeriesRepository $repository): Response
    {
        $repository->save($request);
        return response(status: 201); //Named parameters.
    }

    public function show(Serie $series)
    {
        return response()->json($series);
    }

    public function update(Request $request, Serie $series): Response
    {
        $series->fill($request->all());
        $series->save();

        return response(status: 204);

    }

    public function destroy(Serie $serie): Response
    {
        $serie->delete();
        return response(status: 204);
    }
}


