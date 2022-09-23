<?php

namespace App\Listeners;

use App\Models\Scooter;
use App\Models\Trip;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use TarfinLabs\LaravelSpatial\Types\Point;


class ScooterFinalUpdate
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct() 
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $sc = Scooter::find($event->scooter);
        $sc->location = new Point(lat: $event->currLat, lng: $event->currLng);
        $sc->save();
    }
}
