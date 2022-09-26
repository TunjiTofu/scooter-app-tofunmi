<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;

use Tests\TestCase;

class b_UpdateTripTest extends TestCase
{
    private const ENDPOINT = 'http://localhost/api/v1/trip/update/1';

    public function test_update_trip_should_return_success()
    {
        $response = $this->withHeaders($this->buildRequestHeaders())->json(
            'GET',
            self::ENDPOINT,
            // $this->buildValidRequest()
        );

        $response->assertStatus(200);
        // $response->assertJson(200);
    }

    private function buildRequestHeaders(): array
    {
        return [
            'X-Header' => 'Value',
            'Content-Type' => 'application/vnd.api+json',
            'Accept' => 'application/vnd.api+json',
            'API_KEY' => 'e403d4e8-92ef-4335-a521-35b99746f8f6'
        ];
    }

    private function buildValidRequest(): array
    {
        return [
            'scooter_id' => 'bb8dee5b-016e-43c9-bff6-9373e18321cf',
            'client_id' => '4a47774e-3a88-4d5e-acc9-f8fd589b80d3',
            'startLatitude' => 12.32,
            'startLongitude' => 13.34,
        ];
    }
}
