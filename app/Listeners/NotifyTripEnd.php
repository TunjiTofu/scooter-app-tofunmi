<?php

namespace App\Listeners;

use App\Models\Scooter;
use App\Models\Trip;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

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
        // Scooter::where('id', $event->scooter)->update(['status'=>0]);
        // echo "Trip ended for Scooter with uuid: " . $event->scooter;
        // $sc = Scooter::find($event->scooter);

        $sc = Scooter::find($event->scooter);
        $sc->status = 0;
        $sc->save();
    }
}
