<?php

namespace Tests\Unit;

use App\Http\Requests\StartTripRequest;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class TestStartTripValidator extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->rules = (new StartTripRequest())->rules();
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
            'request_should_fail_when_no_scooter_id_is_provided' => [
                'passed' => false,
                'data' => [
                    'client_id' => 1,
                    'startLatitude' => 12.32,
                    'startLongitude' => 13.34
                ]
            ],
            'request_should_fail_when_no_client_id_is_provided' => [
                'passed' => false,
                'data' => [
                    'scooter_id' => 1,
                    'startLatitude' => 12.32,
                    'startLongitude' => 13.34
                ]
            ],
            'request_should_fail_when_no_start_latitude_is_provided' => [
                'passed' => false,
                'data' => [
                    'scooter_id' => 1,
                    'client_id' => 1,
                    'startLongitude' => 13.34
                ]
            ],
            'request_should_fail_when_no_start_longitude_is_provided' => [
                'passed' => false,
                'data' => [
                    'scooter_id' => 1,
                    'client_id' => 1,
                    'startLatitude' => 13.34
                ]
            ],
            'request_should_pass_when_all_data_is_provided' => [
                'passed' => true,
                'data' => [
                    'scooter_id' => 1,
                    'client_id' => 1,
                    'startLatitude' => 13.34,
                    'startLongitude' => 13.34
                ]
            ],
        ];
    }
}
