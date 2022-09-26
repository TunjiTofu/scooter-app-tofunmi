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
                    "scooter_id" => '57be09f9-7ed5-425b-af2d-3b9c782b7323',
                    "endLatitude" => 34.3434,
                    "endLongitude" => 54.454
                ]
            ],
            'request_should_fail_when_no_scooter_id_is_provided' => [
                'passed' => false,
                'data' => [
                    "client_id" => '4a47774e-3a88-4d5e-acc9-f8fd589b80d3',
                    "endLatitude" => 34.3434,
                    "endLongitude" => 54.454
                ]
            ],
            'request_should_fail_when_no_end_latitude_is_provided' => [
                'passed' => false,
                'data' => [
                    "scooter_id" => '57be09f9-7ed5-425b-af2d-3b9c782b7323',
                    "client_id" => '4a47774e-3a88-4d5e-acc9-f8fd589b80d3',
                    "endLongitude" => 54.454
                ]
            ],
            'request_should_fail_when_no_end_longitude_is_provided' => [
                'passed' => false,
                'data' => [
                    "scooter_id" => '57be09f9-7ed5-425b-af2d-3b9c782b7323',
                    "client_id" => '4a47774e-3a88-4d5e-acc9-f8fd589b80d3',
                    "endLatitude" => 34.3434,
                ]
            ],
        ];
    }
}
