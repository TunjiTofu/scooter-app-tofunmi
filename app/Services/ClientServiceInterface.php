<?php

namespace App\Services;

interface ClientServiceInterface
{
    public function getClientByUuid(string $clientId);
}
