<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class EndTrip extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scooter:end';

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
        info('Scooter Trip Ended');
        sleep(5);
        info('Scooter is ready for next available pick up');
    }
}
