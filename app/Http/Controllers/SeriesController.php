<?php

namespace App\Http\Controllers;

use App\Repositories\EloquentSeriesRepository;
use App\Repositories\SeriesRepository;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use App\Models\Serie;
use App\Http\Requests\SeriesRequestForm;
use Illuminate\Support\Facades\Auth;
use Mockery\Exception;

class SeriesController extends Controller
{

    public function __construct()
    {
        $this->middleware('authenticator')
            ->except('index');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $flashMessage = $request->session()->get('message.success');

        $series = Serie::all();

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
    public function store(SeriesRequestForm $request, SeriesRepository $repository)
    {

        $serie = $repository->save($request);

        return to_route('series.index')
            ->with('message.success', "Série '{$request->name}' adicionada com sucesso!");

    }

    /**
     * Display the specified resource.
     */
    public function show(Serie $series)
    {
        dd($series);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Serie $series)
    {
        return view('series.edit', [
            'serie' => $series
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SeriesRequestForm $request, Serie $series)
    {

        // dd($series);

        $series->fill($request->all());
        $series->save();

        return to_route('series.index')
        ->with('message.success', "Série '{$series->name}' adicionada sucesso!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Serie $series, SeriesRepository $repository)
    {
        $repository->destroy($series);

        return to_route('series.index')
            ->with('message.success', "Série '{$series->name}' removida com sucesso!");

    }

    /**
     * debug controller
     */

     public function debug(Serie $series)
     {
        dd($series);
     }
}
