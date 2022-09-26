<?php

namespace Tests\Unit;

use App\Console\Commands\StartTrip;
use App\Http\Requests\StartTripRequest;
use App\Repository\TripRepositoryInterface;
use App\Services\TripService;
use App\Services\TripServiceInterface;
// use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Facades\Validator;

use Mockery;
use Mockery\MockInterface;
use Tests\TestCase;

class TripServiceTest extends TestCase
{
    protected TripService $tripService;
    public TripRepositoryInterface $tripRepository;
    private Validator $validator;

    public function setUp(): void
    {
        parent::setUp();
        $this->tripRepository = $this->createMock(TripRepositoryInterface::class);
        $this->tripService = new TripService($this->tripRepository);
    }

    // public function testStartTrip()
    // {
    //     $response = $this->tripService->startTrip($this->buildStartTripRequest());
    //     dd($response);
    //     $this->assertNotEmpty($response);
    // }

    public function buildStartTripRequest()
    {
        $request = [
            "scooter_id" => 'bb8dee5b-016e-43c9-bff6-9373e18321cf',
            "client_id" => '4a47774e-3a88-4d5e-acc9-f8fd589b80d3',
            'startLatitude' => 12.32,
            'startLongitude' => 13.34,
        ];
        $tt = new StartTripRequest($request);
        // $tt->setJson(
            // json_encode()
        // );

        // return Mockery::mock(StartTripRequest::class, function (MockInterface $mock, $request) {
        //     $mock->shouldReceive('all')->andReturnValues($request);
        // });
        return $tt;
    }

    private function startTripResponse()
    {
        $response = '{
            "message": "Trip Started",
            "results": {
                "scooter_id": 4,
                "client_id": 2,
                "start_location": {
                    "lat": 34.3434,
                    "lng": -1.1195537,
                    "srid": 0
                },
                "current_location": {
                    "lat": 34.3434,
                    "lng": -1.1195537,
                    "srid": 0
                },
                "end_location": {
                    "lat": 0,
                    "lng": 0,
                    "srid": 0
                },
                "status": 1,
                "updated_at": "2022-09-24T23:04:31.000000Z",
                "created_at": "2022-09-24T23:04:31.000000Z",
                "id": 15
            }
        }';
    }
}
