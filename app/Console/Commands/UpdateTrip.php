<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class UpdateTrip extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scooter:update {scooterId}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update scooter location';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $scooterId = $this->argument(key: 'scooterId');
        $key = env('API_KEY');

        $response = Http::withHeaders(['API_KEY' => $key])->get('http://localhost/api/v1/trip/update/'. $scooterId);
        if ($response->failed()) {
            $errorMsg = ["Error" => $response->json()];
            print_r($errorMsg);
        } else {
            print("Scooter Location Updated Successfully". PHP_EOL);
        }
    }
}
