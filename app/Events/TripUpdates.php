<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TripUpdates
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $scooter, $location, $trip_id;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($scooter)
    {
        $this->scooter = $scooter;
    }
   
}
