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
    protected $signature = 'scooter:end {client_id} {scooterId} {endLatitude} {endLongitude}';

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
        $client_id = $this->argument(key: 'client_id');
        $scooterId = $this->argument(key: 'scooterId');
        $endLatitude = $this->argument(key: 'endLatitude');
        $endLongitude = $this->argument(key: 'endLongitude');
        $key = env('API_KEY');

        $response = Http::withHeaders(['API_KEY' => $key])->post('http://localhost/api/v1/trip/end', [
            "client_id" => $client_id,
            "scooter_id" => $scooterId,
            "endLatitude" => $endLatitude,
            "endLongitude" => $endLongitude
        ]);
        if ($response->failed()) {
            $errorMsg = ["Error" => $response->json()];
            print_r($errorMsg);
        } else {
            print("Scooter Trip Successfully Ended". PHP_EOL);
            $restTime = rand(2, 5);
            sleep($restTime);
            print("Scooter Resting for " . $restTime . " Seconds...". PHP_EOL);
            print("Scooter is ready for next available pick up". PHP_EOL);
        }
    }
}
