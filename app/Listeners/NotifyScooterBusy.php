<?php

namespace App\Listeners;

use App\Models\Scooter;
class NotifyScooterBusy
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
        Scooter::where('id', $event->scooter)->update(['status'=>1]);
        echo "Trip started for Scooter with uuid: ";// . $event->scooter;
    }
}
