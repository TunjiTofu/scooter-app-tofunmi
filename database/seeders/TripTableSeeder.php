<?php

namespace Database\Seeders;

use App\Models\Trip;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use MatanYadaev\EloquentSpatial\Objects\LineString;
// use MatanYadaev\EloquentSpatial\Objects\Point as ObjectsPoint;
use MatanYadaev\EloquentSpatial\Objects\Point;
use MatanYadaev\EloquentSpatial\Objects\Polygon;
// use Point;

class TripTableSeeder extends Seeder
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
                'scooter_id' => 1,
                'client_id' => 2,
                'startLocation' => new Point(51.5032973, -0.1195537),
                'endLocation' => new Point(51.9032973, -0.7195537),
                'area' => new Polygon([
                    new LineString([
                        new Point(12.455363273620605, 41.90746728266806),
                        new Point(12.450309991836548, 41.906636872349075),
                    ])
                ])
            ],
            [
                'id' => 1,
                'scooter_id' => 1,
                'client_id' => 2,
                'startLocation' => new Point(12.458517551422117, 41.90281205461268),
                'endLocation' => new Point(12.558517551422117, 41.80281205461268),
                'area' => new Polygon([
                    new LineString([
                        new Point(12.45572805404663, 41.90637337450963),
                        new Point(12.455363273620605, 41.90746728266806),
                    ])
                ])
            ],
        ];
        foreach ($data as $key => $value) {
            Trip::create($value);
        }
    }
}
