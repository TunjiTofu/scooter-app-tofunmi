<?php

namespace App\Http\Controllers\Api;

use App\Events\TripBegins;
use App\Events\TripEnds;
use App\Events\TripUpdates;
use App\Http\Controllers\Controller;
use App\Http\Requests\StartTripRequest;
use App\Http\Requests\StopTripRequest;
use App\Http\Requests\StoreTripRequest;
use App\Models\Trip;
use App\Repository\ITripRepository;
use App\Services\TripService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TripController extends Controller
{
    public $tripService;

    public function __construct(TripService $tripService)
    {
        $this->tripService = $tripService;
    }
    
    public function index()
    {
        //load all trips
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
