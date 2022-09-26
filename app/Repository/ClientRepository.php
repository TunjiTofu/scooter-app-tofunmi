<?php

namespace App\Repository;

use App\Models\Client;

class ClientRepository implements ClientRepositoryInterface
{
    public function getClientByUuid(string $clientId)
    {
        return Client::query()
        ->where('uuid', $clientId)
        ->first();
    }
}

?>