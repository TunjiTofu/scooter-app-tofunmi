<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;

use Tests\TestCase;

class LocateScootersTest extends TestCase
{
    private const ENDPOINT = 'http://localhost/api/v1/client/scooters';

    public function test_locate_Scooters_should_return_success()
    {
        $response = $this->withHeaders($this->buildRequestHeaders())->json(
            'POST',
            self::ENDPOINT,
            $this->buildValidRequest()
        );

        $response->assertStatus(200);
    }

    private function buildRequestHeaders(): array
    {
        return [
            'X-Header' => 'Value',
            'Content-Type' => 'application/vnd.api+json',
            'Accept' => 'application/vnd.api+json',
            'API_KEY' => env('API_KEY')
        ];
    }

    private function buildValidRequest(): array
    {
        return [
            "radius" => 10,
            "clientCurrentLat" => 34.3434,
            "clientCurrentLng" => 54.454
        ];
    }
}
