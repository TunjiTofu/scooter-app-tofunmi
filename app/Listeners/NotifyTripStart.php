<?php

namespace App\Listeners;

use App\Models\Scooter;
use App\Traits\ResponseAPI;

class NotifyTripStart
{
    use ResponseAPI;

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
     * @param  \App\Events\TripBegins  $event
     * @return void
     */
    public function handle($event)
    {
        $sc = Scooter::find($event->scooter);
        $sc->status = 1;
        $sc->save();
    }
}
