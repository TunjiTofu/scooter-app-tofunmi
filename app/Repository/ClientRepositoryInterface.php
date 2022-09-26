<?php

namespace App\Repository;

use App\Http\Requests\ClientScooterRequest;

interface ClientRepositoryInterface{
    public function getClientByUuid(string $clientId);
}
 
?> 