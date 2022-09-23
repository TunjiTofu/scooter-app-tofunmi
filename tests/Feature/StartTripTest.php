<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Models\Scooter;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StartTripTest extends TestCase
{
    use RefreshDatabase;

    public function testStertTripIfAllGoesWell()
    {
        // $key = 'tofunmiScooter';
        // $this->actingAs($key, 'api');
        $formData = [
            "scooter_id" => 1,
            "client_id" => 2,
            "startLatitude" => 34.3434,
            "startLongitude" => -1.1195537,
        ];
        $this->withoutExceptionHandling();
        $this->json('POST',route('trip.start'),$formData)
        ->assertStatus(201);
    }
}
