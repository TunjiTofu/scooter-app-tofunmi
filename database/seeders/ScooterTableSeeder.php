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
                'uuid'=> '57be09f9-7ed5-425b-af2d-3b9c782b7323', 
                'location' =>  new Point(lat: 34.3434, lng: 54.454), 
                'status' => 0
            ],
            [
                'id' => 2, 
                'uuid'=> '66d6ca39-9e59-4b97-8236-32fd44375f55', 
                'location' =>  new Point(lat: 34.3434, lng: 54.454), 
                'status' => 0
            ],
            [
                'id' => 3, 
                'uuid'=> 'd6f4179f-5890-4882-9a4d-0eff1e41f22e', 
                'location' =>  new Point(lat: 34.3434, lng: 54.454), 
                'status' => 0
            ],
            [
                'id' => 4, 
                'uuid'=> 'f12b9359-56c4-41d8-8207-6ec7d5bf487a', 
                'location' =>  new Point(lat: 34.3434, lng: 54.454), 
                'status' => 0
            ],
            // [
            //     'id' => 5, 
            //     'uuid'=> Uuid::uuid4()->toString(), 
            //     'location' =>  new Point(lat: 34.3434, lng: 54.454), 
            //     'status' => 0
            // ],
            // [
            //     'id' => 6, 
            //     'uuid'=> Uuid::uuid4()->toString(), 
            //     'location' =>  new Point(lat: 34.3434, lng: 54.454), 
            //     'status' => 0
            // ],
            // [
            //     'id' => 7, 
            //     'uuid'=> Uuid::uuid4()->toString(), 
            //     'location' =>  new Point(lat: 34.3434, lng: 54.454), 
            //     'status' => 0
            // ],
            // [
            //     'id' => 8, 
            //     'uuid'=> Uuid::uuid4()->toString(), 
            //     'location' =>  new Point(lat: 34.3434, lng: 54.454), 
            //     'status' => 0
            // ],
            // [
            //     'id' => 9, 
            //     'uuid'=> Uuid::uuid4()->toString(), 
            //     'location' =>  new Point(lat: 34.3434, lng: 54.454), 
            //     'status' => 0
            // ],
            // [
            //     'id' => 10, 
            //     'uuid'=> Uuid::uuid4()->toString(), 
            //     'location' =>  new Point(lat: 34.3434, lng: 54.454), 
            //     'status' => 0
            // ],
        ];
        foreach ($data as $key => $value) {
            Scooter::create($value);
        }
    }
}