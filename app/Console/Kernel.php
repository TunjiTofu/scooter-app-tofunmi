<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        //variables for scooter location
        // $scooterLocationCommand = 'scooter:location';
        // $radius = 10;
        // $clientLatitude = 34.1212;
        // $clientLongitude = 50.1212;

        // $scooterStartCommand = 'scooter:start';
        // $scooterId = 1;
        // $clientId = 1;
        // $startLatitude = 23.43;
        // $startLongitude = 54.67;

        // $scooterUpdateCommand = 'scooter:update';

        // $scooterEndCommand = 'scooter:end';
        // $tripId = 1;
        // $endLatitude = 23.43;
        // $endLongitude = 54.67;

        // $schedule->command($scooterLocationCommand . ' ' . $radius . ' ' . $clientLatitude . ' ' . $clientLongitude);

        // for ($i = 0; $i < 3; $i++) {
        //     $schedule->command($scooterStartCommand . ' ' . $scooterId . ' ' . $clientId . ' ' . $startLatitude . ' ' . $startLongitude);
        //     $schedule->command($scooterUpdateCommand . ' ' . $scooterId);
        //     $schedule->command($scooterEndCommand . ' ' . $tripId . ' ' . $scooterId . ' ' . $endLatitude . ' ' . $endLongitude);
        // }
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
