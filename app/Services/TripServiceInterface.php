<?php

namespace App\Services;

use App\Http\Requests\StartTripRequest;
use App\Http\Requests\StopTripRequest;

interface TripServiceInterface
{
    public function startTrip(StartTripRequest $request);
    public function stopTrip(StopTripRequest $request);
    public function updateTrip(int $scooter_id);
}
?>