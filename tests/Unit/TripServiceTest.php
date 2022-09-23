<?php

namespace Tests\Unit;

use App\Http\Requests\StartTripRequest;
use App\Repository\TripRepositoryInterface;
use App\Services\TripService;
use Illuminate\Support\Facades\Validator;
use Mockery;
use Mockery\MockInterface;
use Tests\TestCase;
// use PHPUnit\Framework\TestCase;

class TripServiceTest extends TestCase
{
    // protected TripService $tripService;
    // public TripRepositoryInterface $tripRepository;
    // private Validator $validator;

    // protected function setUp(): void
    // {
    //     parent::setUp();
    //     $this->tripRepository = Mockery::mock(TripRepositoryInterface::class);
    //     $this->tripService = new TripService($this->tripRepository);
    // }

    // public function testStartTrip()
    // {
    //     $response = $this->tripService->startTrip($this->buildStartTripRequest());
    //     $this->assertNotEmpty($response);
    // }

    // public function buildStartTripRequest()
    // {
    //     $request = [
    //         'scooter_id' => 1,
    //         'client_id' => 1,
    //         'startLatitude' => 12.32,
    //         'startLongitude' => 13.34,
    //     ];
    //     // Ignore validation -> make it pass true
    //     // return Mockery::mock(StartTripRequest::class, function ($mock, $request) {
    //     //     $mock->shouldReceive('all');
    //     // });
    //     // $mock = Mockery::mock(StartTripRequest::class);
    //     // $mock->sh

    //     return Mockery::mock(StartTripRequest::class, function (MockInterface $mock, $request) {
    //         $mock->shouldReceive('all')->andReturnValues($request);
    //     });
    // }
}
