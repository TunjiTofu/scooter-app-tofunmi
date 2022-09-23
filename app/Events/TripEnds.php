<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TripEnds
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $scooter; 
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
