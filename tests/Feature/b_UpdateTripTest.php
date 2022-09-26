<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;

use Tests\TestCase;

class b_UpdateTripTest extends TestCase
{
    private const ENDPOINT = 'http://localhost/api/v1/trip/update/57be09f9-7ed5-425b-af2d-3b9c782b7323';

    public function test_update_trip_should_return_success()
    {
        $response = $this->withHeaders($this->buildRequestHeaders())->json(
            'GET',
            self::ENDPOINT,
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
}
