<?php

namespace App\Services;

use App\Http\Requests\ClientScooterRequest;

interface ScooterServiceInterface
{
    public function locateScooter(ClientScooterRequest $request);
    public function getScooterByUuid(string $scooterId);
}
 