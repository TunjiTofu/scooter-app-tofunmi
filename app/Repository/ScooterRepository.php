<?php

namespace App\Repository;

use App\Http\Requests\ClientScooterRequest;
use App\Models\Scooter;
use App\Traits\ResponseAPI;
use TarfinLabs\LaravelSpatial\Types\Point;

class ScooterRepository implements ScooterRepositoryInterface
{
    use ResponseAPI;
    
    public function locateScooter(ClientScooterRequest $request)
    {
        try {
            $query = Scooter::query()
            ->withinDistanceTo('location', new Point(lat: $request->clientCurrentLat, lng: $request->clientCurrentLng), $request->radius)
            ->where('status', 0)
            ->get();
    
            return $this->buildSuccessResponse("List of Scooters ".$request->radius. "KM from your Location" , $query, 200);
        } catch (\Throwable $exception) {
            return $this->buildErrorResponse($exception->getMessage(), 403);
        }
    }

    public function getScooterByUuid(string $scooterId)
    {
        return Scooter::query()
        ->where('uuid', $scooterId)
        ->first();
    }
}

?> 