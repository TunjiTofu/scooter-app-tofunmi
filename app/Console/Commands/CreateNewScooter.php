<?php

namespace App\Console\Commands;

use App\Models\Scooter;
use Faker\Provider\Uuid;
use Illuminate\Console\Command;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class CreateNewScooter extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scooters:create {--count=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create New Scooters';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $id = Str::uuid();
        $status = 0;
        $randomPoints = [32.3443, 65.3234, 23.4556, -4.4255, -64.3423, -7.43534, 25.1211];
        $count = $this->option(key: 'count');
        $bar = $this->output->createProgressBar($count);
        $bar->start();
        for ($i = 1; $i <= $count; $i++) {
            $lat = Arr::random($randomPoints);
            $long = Arr::random($randomPoints);
            Scooter::create([
                'status' => $status,
                'defaultLocation' => json_encode([$lat, $long]),
            ]);
            $bar->advance();
        }
        $bar->finish();
        $this->info(string: $count . ' Scooters have been created');

        //echo "First";
    }
}
