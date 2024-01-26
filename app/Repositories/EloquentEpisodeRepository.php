<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class EloquentEpisodeRepository
{
    public function markEpisodeAsWatched(int $episodeId)
    {
        DB::transaction(function() {

        });
    }
}
