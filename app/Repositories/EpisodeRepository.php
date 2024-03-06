<?php

namespace App\Repositories;

use App\Models\Season;

interface EpisodeRepository
{
    public function updateWatchedEpisodes(Season $season, array|null $watchedEpisodes);
}
