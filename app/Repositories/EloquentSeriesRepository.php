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
            $series = Serie::create($request->all());

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

}
