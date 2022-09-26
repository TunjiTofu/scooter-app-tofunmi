<?php

namespace App\Repository;

use App\Http\Requests\StartTripRequest;
use App\Http\Requests\StopTripRequest;

interface TripRepositoryInterface{
    public function startTrip(StartTripRequest $request);
    public function stopTrip(StopTripRequest $request);
    public function updateTrip(string $scooter_id);
    public function isScooterOnTrip(string $scooter_id);
}

?>  