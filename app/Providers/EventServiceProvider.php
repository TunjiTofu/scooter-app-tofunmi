<?php

namespace App\Providers;

use App\Events\ScooterUpdates;
use App\Events\TripBegins;
use App\Events\TripEnds;
use App\Events\TripUpdates;
use App\Listeners\NotifyTripBegin;
use App\Listeners\NotifyTripEnd;
use App\Listeners\NotifyTripStart;
use App\Listeners\ScooterFinalUpdate;
use App\Listeners\ScooterPeriodicUpdate;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

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
        TripBegins::class => [
            NotifyTripStart::class,
        ],
        TripEnds::class => [
            NotifyTripEnd::class,
        ],
        TripUpdates::class => [
            ScooterPeriodicUpdate::class,
        ],
        ScooterUpdates::class => [
            ScooterFinalUpdate::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
