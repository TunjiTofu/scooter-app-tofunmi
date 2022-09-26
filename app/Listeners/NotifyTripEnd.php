<?php

namespace App\Listeners;

use App\Models\Client;
use App\Models\Scooter;
use TarfinLabs\LaravelSpatial\Types\Point;

class NotifyTripEnd
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
        $sc = Scooter::find($event->scooterId);
        $sc->status = 0;
        $sc->location = new Point(lat: $event->endLatitude, lng: $event->endLongitude);
        $sc->save();

        $client = Client::find($event->clientId);
        $client->status = 0;
        $client->save();
    }
}
