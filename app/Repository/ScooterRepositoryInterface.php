<?php

namespace App\Repository;

use App\Http\Requests\ClientScooterRequest;

interface ScooterRepositoryInterface{
    public function locateScooter(ClientScooterRequest $request);
    public function getScooterByUuid(string $scooterId);
}
 
?>  