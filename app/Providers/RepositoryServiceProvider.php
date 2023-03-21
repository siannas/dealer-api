<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\RepositoryInterfaces\KendaraanRepository as KendaraanRepositoryInterface;
use App\Repositories\KendaraanRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(KendaraanRepositoryInterface::class, KendaraanRepository::class);
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
