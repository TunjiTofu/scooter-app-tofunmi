<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;

use Tests\TestCase;

class b_EndTripTest extends TestCase
{
    private const ENDPOINT = 'http://localhost/api/v1/trip/end';

    public function test_end_trip_should_return_success()
    {
        $response = $this->withHeaders($this->buildRequestHeaders())->json(
            'POST',
            self::ENDPOINT,
            $this->buildValidRequest()
        );

        $response->assertStatus(200);
    }

    public function test_trip_already_ended_status_code()
    {
        $response = $this->withHeaders($this->buildRequestHeaders())->json(
            'POST',
            self::ENDPOINT,
            $this->buildValidRequest()
        );

        $response->assertStatus(403);
    }

    public function test_trip_yet_to_begin_status_code()
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
            'API_KEY' => 'tofunmiScooter'
        ];
    }

    private function buildValidRequest(): array
    {
        return [
            "trip_id" => 1,
            "scooter_id" => 1,
            "endLatitude" =>  34.3434,
            "endLongitude" => 54.454
        ];
    }
}
