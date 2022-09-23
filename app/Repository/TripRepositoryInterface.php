<?php
namespace App\Repository;

use App\Http\Requests\StartTripRequest;
use App\Http\Requests\StopTripRequest;
use App\Http\Requests\StoreTripRequest;

interface TripRepositoryInterface{
    // public function getAllTrips();

    public function startTrip(StartTripRequest $request, int $id=null);
    // public function startScooterTrip(array $data);
    public function stopTrip(StopTripRequest $request);
    public function updateTrip(int $scooter_id);
}

?> 