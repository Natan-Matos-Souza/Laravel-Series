<?php

namespace App\Http\Controllers;

use App\Events\SeriesDestroyed as SeriesDestroyedEvent;
use App\Http\Middleware\Authenticator;
use App\Jobs\RemoveSeriesCoverJob;
use App\Mail\SeriesCreated;
use App\Events\SeriesCreated as SeriesCreatedEvent;
use App\Models\User;
use App\Repositories\SeriesRepository;
use Illuminate\Http\Request;
use App\Models\Serie;
use App\Http\Requests\SeriesRequestForm;
use Illuminate\Support\Facades\Mail;

class SeriesController extends Controller
{

    public function __construct()
    {
        $this->middleware(Authenticator::class)
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

        $coverPath = $request->file('image')->store('covers', 'public');

        $request->coverPath = $coverPath;

        // dd([...$request->only(['name']), 'coverPath' => $request->coverPath]);

        $serie = $repository->save($request);

        SeriesCreatedEvent::dispatch(
            $serie
        );

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
    public function update(SeriesRequestForm $request, Serie $series, SeriesRepository $repository)
    {        

        // $series->fill($request->all());
        // $series->save();
        $cover = $request->file('image');
        $cover  = $cover ? $cover->store('covers', 'public') : null;
        
        $request->coverPath = $cover;

        $repository->edit($series, $request);

        return to_route('series.index')
        ->with('message.success', "Série '{$series->name}' adicionada sucesso!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Serie $series, SeriesRepository $repository)
    {
        $destroyedSerie = $repository->destroy($series);
        
        // SeriesDestroyedEvent::dispatch(
        //     $destroyedSerie
        // );

        RemoveSeriesCoverJob::dispatch(
            $destroyedSerie
        );

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