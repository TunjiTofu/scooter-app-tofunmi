<?php

namespace Tests\Unit;

use App\Http\Requests\StartTripRequest;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class StartTripValidatorTest extends TestCase
{
    public function setUp(): void
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
                    'client_id' => '4a47774e-3a88-4d5e-acc9-f8fd589b80d3',
                    'startLatitude' => 12.32,
                    'startLongitude' => 13.34
                ]
            ],
            'request_should_fail_when_no_client_id_is_provided' => [
                'passed' => false,
                'data' => [
                    'scooter_id' => 'bb8dee5b-016e-43c9-bff6-9373e18321cf',
                    'startLatitude' => 12.32,
                    'startLongitude' => 13.34
                ]
            ],
            'request_should_fail_when_no_start_latitude_is_provided' => [
                'passed' => false,
                'data' => [
                    'scooter_id' => 'bb8dee5b-016e-43c9-bff6-9373e18321cf',
                    'client_id' => '4a47774e-3a88-4d5e-acc9-f8fd589b80d3',
                    'startLongitude' => 13.34
                ]
            ],
            'request_should_fail_when_no_start_longitude_is_provided' => [
                'passed' => false,
                'data' => [
                    'scooter_id' => 'bb8dee5b-016e-43c9-bff6-9373e18321cf',
                    'client_id' => '4a47774e-3a88-4d5e-acc9-f8fd589b80d3',
                    'startLatitude' => 13.34
                ]
            ],
            'request_should_pass_when_all_data_is_provided' => [
                'passed' => true,
                'data' => [
                    'scooter_id' => 'bb8dee5b-016e-43c9-bff6-9373e18321cf',
                    'client_id' => '4a47774e-3a88-4d5e-acc9-f8fd589b80d3',
                    'startLatitude' => 13.34,
                    'startLongitude' => 13.34
                ]
            ],
        ];
    }
}
