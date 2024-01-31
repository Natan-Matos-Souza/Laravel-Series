<?php

namespace App\Listeners;

use App\Events\SeriesDestroyed as SeriesDestroyedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use File;

class DeleteSeriesCover
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(SeriesDestroyedEvent $event): void
    {
        $filePath = storage_path("app/public/{$event->series->coverPath}");

        Log::info("Apagando arquivo no path: {$filePath}");

        if (File::exists($filePath))
        {
            File::delete($filePath);
            Log::info("Arquivo \"{$filePath}\" removido com sucesso!");
        }

    }
}
