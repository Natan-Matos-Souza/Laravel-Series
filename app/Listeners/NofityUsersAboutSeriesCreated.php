<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\SeriesCreated;
use App\Events\SeriesCreated as SeriesCreatedEvent;


class NofityUsersAboutSeriesCreated
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
    public function handle(SeriesCreatedEvent $event): void
    {
        
        $users = User::all();

        foreach($users as $user)
        {
            Mail::to($user)->queue(new SeriesCreated(
                $user,
                $event->serie
            ));
        }
    }
}
