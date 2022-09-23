<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ScooterUpdates
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $scooter, $currLat, $currLng;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($scooter, $currLat, $currLng)
    {
        $this->scooter = $scooter;
        $this->currLat = $currLat;
        $this->currLng = $currLng;
    }
   
}
