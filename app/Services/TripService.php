<?php

namespace App\Services;

use App\Http\Requests\StartTripRequest;
use App\Http\Requests\StopTripRequest;
use App\Repository\TripRepositoryInterface;

class TripService implements TripServiceInterface
{
    public TripRepositoryInterface $trip;

    public function __construct(TripRepositoryInterface $trip)
    {
        $this->trip = $trip;
    }

    public function startTrip(StartTripRequest $request)
    {
        return $this->trip->startTrip($request);
    }

    public function stopTrip(StopTripRequest $request) 
    {
       return $this->trip->stopTrip($request);
    }

    public function updateTrip(string $scooter_id)
    {
       return $this->trip->updateTrip($scooter_id);
    }

    public function isScooterOnTrip(string $scooter_id)
    {
        return $this->trip->isScooterOnTrip($scooter_id);
    }

}
?>