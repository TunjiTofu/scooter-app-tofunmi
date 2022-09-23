<?php

namespace App\Repository;

use App\Events\TripBegins;
use App\Http\Requests\StartTripRequest;
use App\Http\Requests\StopTripRequest;
use App\Http\Requests\StoreTripRequest;
use App\Models\Scooter;
use App\Models\Trip;
use App\Traits\ResponseAPI;
use MatanYadaev\EloquentSpatial\Objects\Point;
//use MatanYadaev\EloquentSpatial\Objects\Point;

class StopTripRepository implements TripRepositoryInterface
{
    use ResponseAPI;
    protected $trip;

    public function __construct(Trip $trip)
    {
        $this->trip = $trip;
    }
    public function startScooterTrip(StartTripRequest $request, int $id = null)
    {
        
    }

    public function stopScooterTrip(StopTripRequest $request, int $id)
    {
        // Trip::where('id', $id)->update(['endLocation' => new Point(23.3423, 32.324)]);


        Trip::where('id', $id)
            ->update([
            //     'startLocation' => new Point($request->endLatitude, $request->endLongitude),
            // 'currentLocation' => new Point($request->endLatitude, $request->endLongitude),
                'endLocation' => new Point(12.455363273620605, 41.90746728266806),
                'status' => 0
            ]);

        // $query = $this->trip->query()->where('id', $id)->update([
        //     'endLocation' => new Point(12.34432, -3.454554),
        //     //     // 'startLocation' => json_encode($data['startLoca),
        //     // 'status' => 0,

        // ]);

        //Event
        //    TripBegins::dispatch($request->scooter_id);

        //    return $this->success("Trip Ended", $query, 200 );


        // $trip = Trip::find($id);
        // $trip->status = 1;
        // $trip->save();

        // Trip::where('id', $id)->update(['endLocation' => json_encode($data['endLocation'])]);
    }

    public function updateScooterTrip(array $data, $id)
    {
        Trip::where('id', $id)->update(['currentLocation' => json_encode($data['currentLocation'])]);
    }
}
