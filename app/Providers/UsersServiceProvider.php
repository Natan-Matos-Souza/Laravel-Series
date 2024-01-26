<?php

namespace App\Providers;

use App\Repositories\EloquentUsersRepository;
use App\Repositories\UsersRepository;
use Illuminate\Support\ServiceProvider;

class UsersServiceProvider extends ServiceProvider
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
