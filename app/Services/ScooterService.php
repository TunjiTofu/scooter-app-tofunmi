<?php

namespace App\Services;

use App\Http\Requests\ClientScooterRequest;
use App\Repository\ScooterRepositoryInterface;
class ScooterService implements ScooterServiceInterface
{
    public ScooterRepositoryInterface $scooter;

    public function __construct(ScooterRepositoryInterface $scooter)
    {
        $this->scooter = $scooter;
    }

    public function locateScooter(ClientScooterRequest $request)
    {
       return $this->scooter->locateScooter($request);
    } 

    public function getScooterByUuid(string $scooterId)
    {
       return $this->scooter->getScooterByUuid($scooterId);
    }

}
?> 