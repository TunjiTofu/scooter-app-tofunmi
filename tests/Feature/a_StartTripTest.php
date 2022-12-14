<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;

use Tests\TestCase;

class c_StartTripTest extends TestCase
{
    private const ENDPOINT = 'http://localhost/api/v1/trip/start';

    public function test_start_trip_should_return_success()
    {
        $response = $this->withHeaders($this->buildRequestHeaders())->json(
            'POST',
            self::ENDPOINT,
            $this->buildValidRequest()
        );

        $response->assertStatus(200);
    }

    public function test_scooter_busy_status_code()
    {
        $response = $this->withHeaders($this->buildRequestHeaders())->json(
            'POST',
            self::ENDPOINT,
            $this->buildValidRequest()
        );

        $response->assertStatus(403);
    }

    public function test_scooter_client_status_code()
    {
        $response = $this->withHeaders($this->buildRequestHeaders())->json(
            'POST',
            self::ENDPOINT,
            $this->buildValidRequest()
        );

        $response->assertStatus(403);
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
            'scooter_id' => '57be09f9-7ed5-425b-af2d-3b9c782b7323',
            'client_id' => '4a47774e-3a88-4d5e-acc9-f8fd589b80d3',
            'startLatitude' => 12.32,
            'startLongitude' => 13.34,
        ];
    }
}
