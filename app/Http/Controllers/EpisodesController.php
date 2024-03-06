<?php

namespace App\Http\Controllers;

use App\Models\Season;
use App\Repositories\EpisodeRepository;
use Illuminate\Http\Request;

class EpisodesController
{
    public function index(Season $seasons)
    {
        return view('episodes.index', [
            "episodes" => $seasons->episodes,
            "seasons"   => $seasons
        ]);
    }
    public function update(Request $request, Season $seasons, EpisodeRepository $repository)
    {
        $watchedEpisode = $request->get('episodes');

        $repository->updateWatchedEpisodes($seasons, $watchedEpisode);

        return to_route('series.index')
            ->with('message.success', 'Episódios salvos como "assistido" com sucesso!');
    }
}
