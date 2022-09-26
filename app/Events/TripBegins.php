<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
 
class TripBegins
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $scooterId;
    public $clientId;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($scooterId, $clientId)
    {
        $this->scooterId = $scooterId;
        $this->clientId = $clientId;
    }

}
