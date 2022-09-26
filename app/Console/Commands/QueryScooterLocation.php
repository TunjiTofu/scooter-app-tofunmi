<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class QueryScooterLocation extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scooter:location {radius} {clientCurrentLat} {clientCurrentLng}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Query Scooter Location';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $radius = $this->argument(key: 'radius');
        $clientCurrentLat = $this->argument(key: 'clientCurrentLat');
        $clientCurrentLng = $this->argument(key: 'clientCurrentLng');
        $key = env('API_KEY');

        $response = Http::withHeaders(['API_KEY' => $key])->post('http://localhost/api/v1/client/scooters', [
            "radius" =>$radius,
            "clientCurrentLat" => $clientCurrentLat,
            "clientCurrentLng" => $clientCurrentLng
        ]);
        if($response->failed()){
            $errorMsg = ["message"=> 'Error Locating Scooters'];
            print($errorMsg . PHP_EOL);
        }
        print("Scooters Within Location Successfully Retrieved". PHP_EOL);
    }
}
