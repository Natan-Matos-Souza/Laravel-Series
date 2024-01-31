<?php

namespace App\Providers;

use App\Events\SeriesCreated;
use App\Events\SeriesDestroyed;
use App\Listeners\DeleteSeriesCover;
use App\Listeners\LogSeriesCreated;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Listeners\NofityUsersAboutSeriesCreated;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        SeriesCreated::class => [
            NofityUsersAboutSeriesCreated::class,
            LogSeriesCreated::class
        ],

        SeriesDestroyed::class => [
            DeleteSeriesCover::class
        ]
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
