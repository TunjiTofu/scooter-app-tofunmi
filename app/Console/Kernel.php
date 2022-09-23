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
        $schedule->command('scooter:location 10 34.1212 50.1212')->everyMinute()->runInBackground();
        for ($i = 0; $i < 3; $i++) {
            $schedule->command('scooter:start 1 1 23.23 44.44')->everyMinute()->runInBackground();
            $schedule->command('scooter:update 1')->everyMinute()->runInBackground();
            $schedule->command('scooter:end 9 1 12.12 56.56')->everyMinute()->runInBackground();
        }
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
