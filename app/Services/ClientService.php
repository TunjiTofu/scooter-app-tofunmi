<?php

namespace App\Services;

use App\Http\Requests\ClientScooterRequest;
use App\Repository\ClientRepositoryInterface;
use App\Repository\ScooterRepositoryInterface;
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
?>