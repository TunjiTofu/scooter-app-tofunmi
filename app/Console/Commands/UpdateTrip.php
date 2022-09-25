<?php

namespace App\Console\Commands;

use App\Models\Trip;
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

        $response = Http::withHeaders(['API_KEY' => $key])->get('http://localhost/api/v1/trip/update/'.$scooterId);
        if ($response->failed()) {
            $errorMsg = ["message" => 'Error Updating Scooter' . $scooterId];
            info($errorMsg);
        }
        $postResponse = $response->json();
        info($postResponse);
    }
}
