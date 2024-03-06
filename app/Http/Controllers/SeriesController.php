<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Authenticator;
use App\Jobs\DeleteUselessCoverJob;
use App\Jobs\RemoveSeriesCoverJob;
use App\Events\SeriesCreated as SeriesCreatedEvent;
use App\Repositories\SeriesRepository;
use Illuminate\Http\Request;
use App\Models\Serie;
use App\Http\Requests\SeriesRequestForm;

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

        $series = Serie::query()->paginate(5);

        return view('series.index', [
            'series'         => $series,
            "flashMessage"   => $flashMessage
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): string
    {
        return view('series.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SeriesRequestForm $request, SeriesRepository $repository)
    {

        $coverPath = $request->file('image');

        $coverPath = $coverPath?->store('covers', 'public'); //Se $coverPath não for nulo, executa o método store();

        $request->coverPath = $coverPath;

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
    public function show(Serie $series): void
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


        $cover = $request->file('image');
        $cover  = $cover ? $cover->store('covers', 'public') : null;
        if ($cover) DeleteUselessCoverJob::dispatch($series);
        $request->coverPath = $cover;
        $repository->edit($series, $request);

        return to_route('series.index')
        ->with('message.success', "Série '{$series->name}' adicionada sucesso!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Serie $series, SeriesRepository $repository): string
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

     public function debug(Serie $series): void
     {
        dd($series);
     }
}
