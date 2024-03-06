<?php

namespace App\Repositories;

use App\Models\Episode;
use App\Models\Season;
use Illuminate\Support\Facades\DB;

class EloquentEpisodeRepository implements EpisodeRepository
{
    public function updateWatchedEpisodes(Season $season, array|null $watchedEpisodes): void
    {

        DB::beginTransaction();

        $season->episodes->each(function(Episode $episode) use ($watchedEpisodes) {
            is_array($watchedEpisodes) ? $episode->watched = in_array($episode->episode_id, $watchedEpisodes) : $episode->watched = false;
        });

        $season->push();

        DB::commit();

    }
}
