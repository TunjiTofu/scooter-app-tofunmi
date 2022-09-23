<?php

namespace App\Console\Commands;

use App\Models\Trip;
use Illuminate\Console\Command;

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
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $scooterId = $this->argument(key: 'scooterId');
        $query = Trip::select("currentLocation")
            ->where(
                "scooter_id",
                "=",
                $scooterId
            )->first()->toArray();

        if($query){
            $currentLong = $query['currentLocation'][0]+0.11; //every 11 seconds
            $currentLat = $query['currentLocation'][1]+0.11; //every 11 seconds
            Trip::where('scooter_id', $scooterId)->update(['currentLocation' => json_encode([$currentLong, $currentLat])]);
            info('Current Location for Scooter with ID '. $scooterId. ' is Long: '. $currentLong. ' and Lat: '.$currentLat);

           $this->info('');
           $this->info('Location of Scooter with ID '. $scooterId.' Updated');
           $this->info('');

        }
    }
}
