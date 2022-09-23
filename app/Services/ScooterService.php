<?php

namespace App\Services;

use App\Events\TripBegins;
use App\Http\Requests\ClientScooterRequest;
use App\Http\Requests\StartTripRequest;
use App\Http\Requests\StopTripRequest;
use App\Http\Requests\StoreTripRequest;
use App\Repository\ITripRepository;
use App\Repository\ScooterRepositoryInterface;
use App\Repository\TripRepositoryInterface;

class ScooterService
{
    public $scooter;

    public function __construct(ScooterRepositoryInterface $scooter)
    {
        $this->scooter = $scooter;
    }

    public function locateScooter(ClientScooterRequest $request)
    {
       return $this->scooter->locateScooterForClient($request);
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