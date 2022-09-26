<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;

class ClientTableSeeder extends Seeder
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
                'uuid'=> '4a47774e-3a88-4d5e-acc9-f8fd589b80d3', 
            ],
            [
                'id' => 2,
                'uuid'=> '84442851-1db3-46b3-bf5c-0456b32d77bc', 
            ],
            [
                'id' => 3,
                'uuid'=> '20b6aa95-8b63-4eb3-bf61-c71dccc93b7c', 
            ],
            [
                'id' => 4,
                'uuid'=> 'a0506233-3508-4891-a694-0627d71e625b', 
            ],
            // [
            //     'id' => 5,
            //     'uuid'=> Uuid::uuid4()->toString(), 
            // ],
            // [
            //     'id' => 6,
            //     'uuid'=> Uuid::uuid4()->toString(), 
            // ],
            // [
            //     'id' => 7,
            //     'uuid'=> Uuid::uuid4()->toString(), 
            // ],
            // [
            //     'id' => 8,
            //     'uuid'=> Uuid::uuid4()->toString(), 
            // ],
            // [
            //     'id' => 9,
            //     'uuid'=> Uuid::uuid4()->toString(), 
            // ],
            // [
            //     'id' => 10,
            //     'uuid'=> Uuid::uuid4()->toString(), 
            // ],
        ];
        foreach ($data as $key => $value) {
            Client::create($value);
        }
    }
}
