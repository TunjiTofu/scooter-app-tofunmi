<?php

namespace Database\Seeders;

use App\Models\Scooter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use TarfinLabs\LaravelSpatial\Types\Point;


class ScooterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['id' => 1, 'location' =>  new Point(lat: 34.3434, lng: 54.454), 'status' => 0],
            ['id' => 2, 'location' =>  new Point(lat: 34.3434, lng: 54.454), 'status' => 0],
            ['id' => 3, 'location' =>  new Point(lat: 34.3434, lng: 54.454), 'status' => 0],
            ['id' => 4, 'location' =>  new Point(lat: 34.3434, lng: 54.454), 'status' => 0],
            ['id' => 5, 'location' =>  new Point(lat: 34.3434, lng: 54.454), 'status' => 0],
            ['id' => 6, 'location' =>  new Point(lat: 34.3434, lng: 54.454), 'status' => 0],
            ['id' => 7, 'location' =>  new Point(lat: 34.3434, lng: 54.454), 'status' => 0],
            ['id' => 8, 'location' =>  new Point(lat: 34.3434, lng: 54.454), 'status' => 0],
            ['id' => 9, 'location' =>  new Point(lat: 34.3434, lng: 54.454), 'status' => 0],
            ['id' => 10, 'location' =>  new Point(lat: 34.3434, lng: 54.454), 'status' => 0],
           
        ];
        foreach ($data as $key => $value) {
            Scooter::create($value);
        }
    }
}