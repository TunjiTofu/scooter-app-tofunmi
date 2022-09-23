<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class EndTrip extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scooter:end {tripId} {scooterId} {endLatitude} {endLongitude}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'End Scooter Trip';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $tripId = $this->argument(key: 'tripId');
        $scooterId = $this->argument(key: 'scooterId');
        $endLatitude = $this->argument(key: 'endLatitude');
        $endLongitude = $this->argument(key: 'endLongitude');

        $response = Http::post('http://localhost/api/v1/client/scooters/'.$tripId, [
            "scooter_id" => $scooterId,
            "endLatitude" =>$endLatitude,
            "endLongitude" => $endLongitude
        ]);
        // if ($response->failed()) {
        //     $errorMsg = ["message" => 'Error Ending Trip'];
        //     dd($errorMsg);
        // }
        $postResponse = $response->json();
        dd($postResponse);


        // info('Scooter Trip Ended');
        // sleep(5);
        // info('Scooter is ready for next available pick up');
    }
}
