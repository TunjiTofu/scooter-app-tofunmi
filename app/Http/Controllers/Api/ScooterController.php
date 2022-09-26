<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClientScooterRequest;
use App\Services\ScooterServiceInterface;

class ScooterController extends Controller
{
    public ScooterServiceInterface $scooterService;

    public function __construct(ScooterServiceInterface $scooterService)
    {
        $this->scooterService = $scooterService;
    }

    public function locateScooters(ClientScooterRequest $request)
    {
        return $this->scooterService->locateScooter($request);
    }
}
