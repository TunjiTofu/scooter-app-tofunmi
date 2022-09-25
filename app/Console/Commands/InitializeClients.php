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
        $scooterId = 1;
        $clientId = 1;
        $startLatitude = "23.43";
        $startLongitude = "54.67";

        $scooterUpdateCommand = 'scooter:update';

        $scooterEndCommand = 'scooter:end';
        $tripId = 1;
        $endLatitude = "23.43";
        $endLongitude = "54.67";

        $this->call($scooterLocationCommand, ['radius' => $radius, 'clientCurrentLat' => $clientLatitude, 'clientCurrentLng' => $clientLongitude]);

        for ($i = 1; $i <= 3; $i++) {
            info("Process " . $i);
            $this->call($scooterStartCommand, ['scooter_id' => $i, 'client_id' => $i, 'startLatitude' => $startLatitude, 'startLongitude' => $startLongitude]);
            $this->call($scooterUpdateCommand, ['scooterId' => $i]);
            $this->call($scooterEndCommand, ['trip_id' => $i, 'scooterId' => $i, 'endLatitude' => $endLatitude, 'endLongitude' => $endLongitude]);
            info("---------------------------------------");
        }
    }
}
