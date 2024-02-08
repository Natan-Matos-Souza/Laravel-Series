<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use App\Models\Season;
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
    public function update(Request $request, Season $seasons)
    {
        $watchedEpisode = $request->get('episodes');

        $seasons->episodes->each(function(Episode $episode) use ($watchedEpisode) {

            if (is_array($watchedEpisode)) {
                $episode->watched = in_array($episode->episode_id, $watchedEpisode);
            } else {
                $episode->watched = false;
            }

        });

        $seasons->push();

        return to_route('series.index')
            ->with('message.success', 'Episódios salvos como "assistido" com sucesso!');
    }
}
