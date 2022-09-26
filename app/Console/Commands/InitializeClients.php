<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Http;

class InitializeClients extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'run:clients';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Initialize Client Processes';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $scooterLocationCommand = 'scooter:location';
        $radius = 10;
        $clientLatitude = "34.1212";
        $clientLongitude = "50.1212";

        $scooterStartCommand = 'scooter:start';
        $scooterId = ["57be09f9-7ed5-425b-af2d-3b9c782b7323", "66d6ca39-9e59-4b97-8236-32fd44375f55", "d6f4179f-5890-4882-9a4d-0eff1e41f22e"];
        $clientId = ["4a47774e-3a88-4d5e-acc9-f8fd589b80d3", "84442851-1db3-46b3-bf5c-0456b32d77bc", "20b6aa95-8b63-4eb3-bf61-c71dccc93b7c"];
        $startLatitude = "23.43";
        $startLongitude = "54.67";

        $scooterUpdateCommand = 'scooter:update';

        $scooterEndCommand = 'scooter:end';
        $endLatitude = "65.3323";
        $endLongitude = "81.0933";

        $this->call($scooterLocationCommand, ['radius' => $radius, 'clientCurrentLat' => $clientLatitude, 'clientCurrentLng' => $clientLongitude]);

        for ($i = 0; $i <= 2; $i++) {
            print("Process " . $i+1 . PHP_EOL);
            $this->call($scooterStartCommand, ['scooter_id' => $scooterId[$i], 'client_id' => $clientId[$i], 'startLatitude' => $startLatitude, 'startLongitude' => $startLongitude]);
            $this->call($scooterUpdateCommand, ['scooterId' => $scooterId[$i]]);
            $this->call($scooterEndCommand, ['client_id' => $clientId[$i], 'scooterId' => $scooterId[$i], 'endLatitude' => $endLatitude, 'endLongitude' => $endLongitude]);
            print("---------------------------------------------------------------------". PHP_EOL);
        }
    }
}
