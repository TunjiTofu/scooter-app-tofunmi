<?php

namespace App\Console\Commands;

use App\Models\Scooter;
use Illuminate\Console\Command;

class QueryScooterLocation extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scooter:location';

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
        // $lat1 = $this->ask('Enter Latitude of Point A');
        // $long1 = $this->ask('Enter Longitude of Point A');
        // $lat2 = $this->ask('Enter Latitude of Point B');
        // $long2 = $this->ask('Enter Longitude of Point B');
        // $coord2 = $this->ask('Enter 2nd pair of coordinates');
        // $points = $this->argument('point');

        // for ($i=0; $i < 4; $i++) { 
        //     $this->info(string: $points[$i] );
        // } 
        // $query = Scooter::where('status', '=', 0)->get();
        $headers = ['id', 'Default Location'];
        $query = Scooter::select("id", "defaultLocation")
            ->where(
                "status",
                "=",
                0
            )->get()->toArray();


        $this->info(string: ' Available Scooters and their Location');

        $this->table($headers, $query);
        // print_r($query);



        //         $array = ['1'=>'100','2'=>'500','3'=>'1000','4'=>'2000'];
        // $n = 361;
        // rsort($array);

        // Foreach($array as $key => $val){
        //     If($n > $val){
        //         $res = $val;
        //         Break;
        //     }
        // }

    }
}
