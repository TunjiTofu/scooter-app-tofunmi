<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StartTripRequest;
use App\Http\Requests\StopTripRequest;
use App\Services\TripServiceInterface;

class TripController extends Controller
{
    public TripServiceInterface $tripService;

    public function __construct(TripServiceInterface $tripService)
    {
        $this->tripService = $tripService;
    }
   
    public function startTrip(StartTripRequest $request)
    {
       return $this->tripService->startTrip($request); 
    }

    public function endTrip(StopTripRequest $request)
    {
       return $this->tripService->stopTrip($request);
    }

    public function updateTrip(int $scooter_id)
    {
        return $this->tripService->updateTrip($scooter_id);
    }

}
