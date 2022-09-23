<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class StartTrip extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scooter:start {scooter_id} {client_id} {startLatitude} {startLongitude}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Start Scooter Trip';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $scooter_id = $this->argument(key: 'scooter_id');
        $client_id = $this->argument(key: 'client_id');
        $startLatitude = $this->argument(key: 'startLatitude');
        $startLongitude = $this->argument(key: 'startLongitude');
        $key = env('API_KEY');

        $response = Http::withHeaders(['API_KEY' => $key])->post('http://localhost/api/v1/trip/start', [
            "scooter_id" => $scooter_id,
            "client_id" => $client_id,
            "startLatitude" => $startLatitude,
            "startLongitude" => $startLongitude,
        ]);
        if ($response->failed()) {
            $errorMsg = ["message" => 'Error Ending Trip'];
            // dd($errorMsg);
            info($errorMsg);
        }
        $postResponse = $response->json();
        dd($postResponse);
        info($postResponse);
    }
}
