<?php

namespace Tests\Unit;

use App\Http\Requests\StopTripRequest;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class StopTripValidatorTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->rules = (new StopTripRequest())->rules();
    }

    /**
     * @test
     * @dataProvider validationProvider
     * @param bool $shouldPass
     * @param array $mockedRequestData
     */
    public function validation_results_as_expected($shouldPass, $mockedRequestData)
    {
        $this->assertEquals(
            $shouldPass,
            $this->validate($mockedRequestData)
        );
    }

    protected function validate($mockedRequestData)
    {
        return Validator::make($mockedRequestData, $this->rules)
            ->passes();
    }

    public function validationProvider()
    {
        return [
            'request_should_fail_when_no_trip_id_is_provided' => [
                'passed' => false,
                'data' => [
                    "scooter_id" => 1,
                    "endLatitude" => 34.3434,
                    "endLongitude" => 54.454
                ]
            ],
            'request_should_fail_when_no_scooter_id_is_provided' => [
                'passed' => false,
                'data' => [
                    "trip_id" => 2,
                    "endLatitude" => 34.3434,
                    "endLongitude" => 54.454
                ]
            ],
            'request_should_fail_when_no_end_latitude_is_provided' => [
                'passed' => false,
                'data' => [
                    "scooter_id" => 1,
                    "trip_id" => 2,
                    "endLongitude" => 54.454
                ]
            ],
            'request_should_fail_when_no_end_longitude_is_provided' => [
                'passed' => false,
                'data' => [
                    "scooter_id" => 1,
                    "trip_id" => 2,
                    "endLatitude" => 34.3434,
                ]
            ],
        ];
    }
}
