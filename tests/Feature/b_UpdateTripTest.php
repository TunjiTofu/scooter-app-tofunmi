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
            'API_KEY' => 'tofunmiScooter'
        ];
    }

    private function buildValidRequest(): array
    {
        return [
            'scooter_id' => 1,
            'client_id' => 1,
            'startLatitude' => 12.32,
            'startLongitude' => 13.34,
        ];
    }
}
