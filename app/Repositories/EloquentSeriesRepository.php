<?php

namespace App\Repositories;

use App\Http\Requests\SeriesRequestForm;
use App\Models\Serie;
use App\Models\Season;
use App\Models\Episode;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class EloquentSeriesRepository implements SeriesRepository
{
    public function save(SeriesRequestForm $request): Serie
    {
        return DB::transaction(function() use($request) {

            $cover = $request->file('image');

            $series = Serie::create([
                ...$request->only('name'),
                'coverPath' => $request->coverPath
            ]);

            $seasons = [];

            for($i = 1; $i <= $request->seasonsQuantity; $i++)
            {
                array_push($seasons, [
                    'series_id' => $series->id,
                    'number'    => $i
                ]);
            }

            Season::insert($seasons);

            $episodes = [];

            foreach($series->seasons as $season)
            {
                for($j = 1; $j <= $request->episodesQuantity; $j++)

                    array_push($episodes, [
                        'season_id'         => $season->season_id,
                        'episode_number'    => $j
                    ]);

            }

            Episode::insert($episodes);

            return $series;
        });

    }

    public function destroy(Serie $series): Serie
    {
        $series->delete();

        return $series;
    }

    public function edit(Serie $series, $request): void
    {
        DB::transaction(function() use ($series, $request) {

            Season::query()->where('series_id', '=', $series->id)->delete();

            $seriesChanges = [
                ...$request->only('name'),
                'coverPath' => $request->coverPath ? $request->coverPath : $series->coverPath
            ];


            $series->fill($seriesChanges);
            $series->save();

            $seasons = [];

            for ($i = 1; $i <= $request->seasonsQuantity; $i++)
            {
                array_push($seasons, [
                    'series_id'       => $series->id,
                    'number' => $i
                ]);
            }


            Season::insert($seasons);

            $seasons = Season::query()->where('series_id', '=', $series->id)->get();

            $episodes = [];

            foreach ($seasons as $season)
            {
                for ($i = 1; $i <= $request->episodesQuantity; $i++)
                {
                    array_push($episodes, [
                        'season_id'        => $season->season_id,
                        'episode_number'    => $i
                    ]);
                }
            }

            Episode::insert($episodes);
        });
    }

}
