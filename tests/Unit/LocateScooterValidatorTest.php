<?php

namespace Tests\Unit;

use App\Http\Requests\ClientScooterRequest;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class LocateScooterValidatorTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->rules = (new ClientScooterRequest())->rules();
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
            'request_should_fail_when_no_radius_is_provided' => [
                'passed' => false,
                'data' => [
                    "clientCurrentLat" => 34.3434,
                    "clientCurrentLng" => 54.454
                ]
            ],
            'request_should_fail_when_no_client_current_latitude_is_provided' => [
                'passed' => false,
                'data' => [
                    "radius" => 10,
                    "clientCurrentLng" => 54.454
                ]
            ],
            'request_should_fail_when_no_client_current_longittude_is_provided' => [
                'passed' => false,
                'data' => [
                    "radius" => 10,
                    "clientCurrentLat" => 34.3434,
                ]
            ],
        ];
    }
}
