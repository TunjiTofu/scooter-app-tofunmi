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
    protected $signature = 'scooter:end {trip_id} {scooterId} {endLatitude} {endLongitude}';

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
        $trip_id = $this->argument(key: 'trip_id');
        $scooterId = $this->argument(key: 'scooterId');
        $endLatitude = $this->argument(key: 'endLatitude');
        $endLongitude = $this->argument(key: 'endLongitude');
        $key = env('API_KEY');

        $response = Http::withHeaders(['API_KEY' => $key])->post('http://localhost/api/v1/trip/end', [
            "trip_id" => $trip_id,
            "scooter_id" => $scooterId,
            "endLatitude" =>$endLatitude,
            "endLongitude" => $endLongitude
        ]);
        if ($response->failed()) {
            $errorMsg = ["message" => 'Error Ending Trip'];
            info($errorMsg);
        }
        info("Scooter Trip Successfully Ended");
        $restTime = rand(2,5);
        sleep($restTime);
        info("Scooter Resting for ". $restTime ." Seconds...");

        info("Scooter is ready for next available pick up");
    } 
}
