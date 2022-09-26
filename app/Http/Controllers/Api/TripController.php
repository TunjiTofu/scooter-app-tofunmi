<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StartTripRequest;
use App\Http\Requests\StopTripRequest;
use App\Services\ClientServiceInterface;
use App\Services\ScooterServiceInterface;
use App\Services\TripServiceInterface;
use App\Traits\ResponseAPI;

class TripController extends Controller
{
    use ResponseAPI;

    public TripServiceInterface $tripService;
    public ScooterServiceInterface $scooterService;
    public ClientServiceInterface $clientService;

    public function __construct(TripServiceInterface $tripService, ScooterServiceInterface $scooterService, ClientServiceInterface $clientService)
    {
        $this->tripService = $tripService;
        $this->scooterService = $scooterService;
        $this->clientService = $clientService;
    }

    public function startTrip(StartTripRequest $request)
    {
        $scooter = $this->scooterService->getScooterByUuid($request->input('scooter_id'));
        if ($scooter == null) {
            return $this->buildErrorResponse('Scooter does not exist', 403);
        }

        if ($scooter->status == 1) {
            return $this->buildErrorResponse('This Scooter is currently busy', 403);
        }

        $client = $this->clientService->getClientByUuid($request->input('client_id'));
        if ($client == null) {
            return $this->buildErrorResponse('Client does not exist', 403);
        }

        if ($client->status == 1) {
            return $this->buildErrorResponse('This Client is already on a trip', 403);
        }

        return $this->tripService->startTrip($request);
    }

    public function endTrip(StopTripRequest $request)
    {
        $scooter = $this->scooterService->getScooterByUuid($request->input('scooter_id'));
        if ($scooter == null) {
            return $this->buildErrorResponse('Scooter does not exist', 403);
        }

        $client = $this->clientService->getClientByUuid($request->input('client_id'));
        if ($client == null) {
            return $this->buildErrorResponse('Client does not exist', 403);
        }
        return $this->tripService->stopTrip($request);
    }

    public function updateTrip(string $scooter_id)
    {
        $scooter = $this->scooterService->getScooterByUuid($scooter_id);
        if ($scooter == null) {
            return $this->buildErrorResponse('Scooter does not exist', 403);
        }
        return $this->tripService->updateTrip($scooter_id);
    }
}
