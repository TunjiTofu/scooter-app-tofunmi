<?php

namespace App\Services;

use App\Repository\ClientRepositoryInterface;
class ClientService implements ClientServiceInterface
{
    public ClientRepositoryInterface $client;

    public function __construct(ClientRepositoryInterface $client)
    {
        $this->client = $client;
    }

    public function getClientByUuid(string $clientId)
    {
       return $this->client->getClientByUuid($clientId);
    }
}
