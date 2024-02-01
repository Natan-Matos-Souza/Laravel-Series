<?php

namespace App\Jobs;

use App\Models\Serie;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class RemoveSeriesCoverJob
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public Serie $series
    )
    {
        
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $path = storage_path("app/public/{$this->series->coverPath}");

        Log::info("Tentando apagar arquivo: \"{$path}\"");
        Storage::disk('public')->delete($this->series->coverPath);
        
    }
}
