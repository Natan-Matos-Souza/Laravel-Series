<?php

namespace App\Providers;

use App\Repositories\EloquentEpisodeRepository;
use App\Repositories\EpisodeRepository;
use Illuminate\Support\ServiceProvider;

class EpisodesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(EpisodeRepository::class, EloquentEpisodeRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
