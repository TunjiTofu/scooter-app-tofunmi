<?php

namespace App\Listeners;

use App\Models\Scooter;
use App\Models\Trip;
use App\Traits\ResponseAPI;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

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
        // info('Trip Started' .$event->scooter);
        $sc = Scooter::find($event->scooter);
        $sc->status = 1;
        $sc->save();
        // Scooter::where('id', $event->scooter)->update(['status' => 1]);
        // $msg = "Trip started for Scooter with uuid: " . $event->scooter;
        // return $this->success($msg,'',200);
    }
}
