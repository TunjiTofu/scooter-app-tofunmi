<?php

namespace App\Services;

use App\Events\TripBegins;
use App\Http\Requests\StartTripRequest;
use App\Http\Requests\StopTripRequest;
use App\Http\Requests\StoreTripRequest;
use App\Repository\ITripRepository;
use App\Repository\TripRepositoryInterface;

class TripService
{
    public $trip;

    public function __construct(TripRepositoryInterface $trip)
    {
        $this->trip = $trip;
    }

    public function startTrip(StartTripRequest $request, int $id=null)
    {
        return $this->trip->startScooterTrip($request);
    }

    public function stopTrip(StopTripRequest $request, int $id)
    {
       return $this->trip->stopScooterTrip($request, $id);
    }

    public function updateTrip(int $scooter_id)
    {
       return $this->trip->updateScooterTrip($scooter_id);
    }
}
?>