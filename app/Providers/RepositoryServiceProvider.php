<?php

namespace App\Providers;

use App\Repositories\Interfaces\SearchProfileInterface;
use App\Repositories\SearchProfileRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(SearchProfileInterface::class, SearchProfileRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
