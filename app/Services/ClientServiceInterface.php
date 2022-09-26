<?php

namespace App\Services;

use App\Http\Requests\ClientScooterRequest;

interface ClientServiceInterface
{
    public function getClientByUuid(string $clientId);
}
