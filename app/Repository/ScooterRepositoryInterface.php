<?php

namespace App\Repository;

use App\Http\Requests\ClientScooterRequest;

interface ScooterRepositoryInterface{
    public function locateScooterForClient(ClientScooterRequest $request);


    public function endScooterTrip($uuid); 
}
 
?> 