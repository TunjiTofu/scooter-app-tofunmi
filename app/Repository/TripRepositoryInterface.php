<?php
namespace App\Repository;

use App\Http\Requests\StartTripRequest;
use App\Http\Requests\StopTripRequest;
use App\Http\Requests\StoreTripRequest;

interface TripRepositoryInterface{
    // public function getAllTrips();

    public function startScooterTrip(StartTripRequest $request, int $id=null);
    // public function startScooterTrip(array $data);
    public function stopScooterTrip(StopTripRequest $request, int $id);
    public function updateScooterTrip(int $scooter_id);
}

?> 