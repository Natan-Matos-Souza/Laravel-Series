<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\Serie;

class SeriesController extends Controller
{

    public function debug(Request $request)
    {

        $serie = new Serie();
        $serie->name = "Natan";
        dd($serie);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $series = Serie::query()->orderBy('name')->get();

        return view('series.index', [
            'series' => $series
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('series.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $serieName = $request->input('name');
        
        $serie = new Serie();
        $serie->name = $serieName;
        $serie->save();

        return redirect('/series');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
