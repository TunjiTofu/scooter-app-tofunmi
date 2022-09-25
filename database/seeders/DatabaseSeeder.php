<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\ClientTableSeeder;
use Database\Seeders\ScooterTableSeeder;
use Database\Seeders\TripTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            ScooterTableSeeder::class,
            ClientTableSeeder::class,
        ]);
    }
}
