<?php

namespace App\Providers;

use App\Repository\ScooterRepositoryInterface;
use App\Repository\ScooterRepository;
use App\Repository\TripRepository;
use App\Repository\TripRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //Connect Controller with Repository
        $this->app->bind(ScooterRepositoryInterface::class, ScooterRepository::class);
        $this->app->bind(TripRepositoryInterface::class, TripRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
