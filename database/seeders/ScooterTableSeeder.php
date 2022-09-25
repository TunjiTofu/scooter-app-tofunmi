<?php

namespace Database\Seeders;

use App\Models\Scooter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;
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
            [
                'id' => 1, 
                'uuid'=> Uuid::uuid4()->toString(), 
                'location' =>  new Point(lat: 34.3434, lng: 54.454), 
                'status' => 0
            ],
            [
                'id' => 2, 
                'uuid'=> Uuid::uuid4()->toString(), 
                'location' =>  new Point(lat: 34.3434, lng: 54.454), 
                'status' => 0
            ],
            [
                'id' => 3, 
                'uuid'=> Uuid::uuid4()->toString(), 
                'location' =>  new Point(lat: 34.3434, lng: 54.454), 
                'status' => 0
            ],
            [
                'id' => 4, 
                'uuid'=> Uuid::uuid4()->toString(), 
                'location' =>  new Point(lat: 34.3434, lng: 54.454), 
                'status' => 0
            ],
            [
                'id' => 5, 
                'uuid'=> Uuid::uuid4()->toString(), 
                'location' =>  new Point(lat: 34.3434, lng: 54.454), 
                'status' => 0
            ],
            [
                'id' => 6, 
                'uuid'=> Uuid::uuid4()->toString(), 
                'location' =>  new Point(lat: 34.3434, lng: 54.454), 
                'status' => 0
            ],
            [
                'id' => 7, 
                'uuid'=> Uuid::uuid4()->toString(), 
                'location' =>  new Point(lat: 34.3434, lng: 54.454), 
                'status' => 0
            ],
            [
                'id' => 8, 
                'uuid'=> Uuid::uuid4()->toString(), 
                'location' =>  new Point(lat: 34.3434, lng: 54.454), 
                'status' => 0
            ],
            [
                'id' => 9, 
                'uuid'=> Uuid::uuid4()->toString(), 
                'location' =>  new Point(lat: 34.3434, lng: 54.454), 
                'status' => 0
            ],
            [
                'id' => 10, 
                'uuid'=> Uuid::uuid4()->toString(), 
                'location' =>  new Point(lat: 34.3434, lng: 54.454), 
                'status' => 0
            ],
        ];
        foreach ($data as $key => $value) {
            Scooter::create($value);
        }
    }
}