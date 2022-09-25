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
                'uuid'=> Uuid::uuid4()->toString(), 
            ],
            [
                'id' => 2,
                'uuid'=> Uuid::uuid4()->toString(), 
            ],
            [
                'id' => 3,
                'uuid'=> Uuid::uuid4()->toString(), 
            ],
            [
                'id' => 4,
                'uuid'=> Uuid::uuid4()->toString(), 
            ],
            [
                'id' => 5,
                'uuid'=> Uuid::uuid4()->toString(), 
            ],
            [
                'id' => 6,
                'uuid'=> Uuid::uuid4()->toString(), 
            ],
            [
                'id' => 7,
                'uuid'=> Uuid::uuid4()->toString(), 
            ],
            [
                'id' => 8,
                'uuid'=> Uuid::uuid4()->toString(), 
            ],
            [
                'id' => 9,
                'uuid'=> Uuid::uuid4()->toString(), 
            ],
            [
                'id' => 10,
                'uuid'=> Uuid::uuid4()->toString(), 
            ],
        ];
        foreach ($data as $key => $value) {
            Client::create($value);
        }
    }
}
