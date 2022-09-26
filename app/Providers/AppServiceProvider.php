<?php

namespace App\Providers;

use App\Repository\ClientRepository;
use App\Repository\ClientRepositoryInterface;
use App\Repository\ScooterRepositoryInterface;
use App\Repository\ScooterRepository;
use App\Repository\TripRepository;
use App\Repository\TripRepositoryInterface;
use App\Services\ClientService;
use App\Services\ClientServiceInterface;
use App\Services\ScooterService;
use App\Services\ScooterServiceInterface;
use App\Services\TripService;
use App\Services\TripServiceInterface;
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
        $this->app->bind(ScooterServiceInterface::class, ScooterService::class);
        $this->app->bind(TripRepositoryInterface::class, TripRepository::class);
        $this->app->bind(TripServiceInterface::class, TripService::class);
        $this->app->bind(ClientRepositoryInterface::class, ClientRepository::class);
        $this->app->bind(ClientServiceInterface::class, ClientService::class);
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
