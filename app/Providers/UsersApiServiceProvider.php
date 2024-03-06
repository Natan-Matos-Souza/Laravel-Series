<?php

namespace App\Providers;

use App\Repositories\Api\EloquentUsersRepository;
use App\Repositories\Api\UsersRepository;
use Illuminate\Support\ServiceProvider;

class UsersApiServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(UsersRepository::class, EloquentUsersRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
