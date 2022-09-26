<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TripEnds
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $scooterId; 
    public $clientId; 
    public $endLatitude;
    public $endLongitude;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($clientId, $scooterId, $endLatitude, $endLongitude)
    {
        $this->clientId = $clientId;
        $this->scooterId = $scooterId;
        $this->endLatitude = $endLatitude;
        $this->endLongitude = $endLongitude;
    }

}
