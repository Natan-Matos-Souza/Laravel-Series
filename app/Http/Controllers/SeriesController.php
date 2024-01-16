<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Serie;

class SeriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $flashMessage = $request->session()->get('message.success');

        // $request->session()->remove('message.success');

        $series = Serie::query()->orderBy('name')->get();

        return view('series.index', [
            'series'         => $series,
            "flashMessage"   => $flashMessage
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
        Serie::create($request->all());

        $request->session()->flash('message.success', 'Série adicionada com sucesso!');

        return to_route('series.index');

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
    public function destroy(Request $request, Serie $series)
    {

        
        $series->delete();

        $request->session()->flash('message.success', "Série '$series->name' removida com sucesso!");

        return to_route('series.index');

    }
}