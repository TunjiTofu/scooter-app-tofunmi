<?php

namespace App\Repository;

use App\Events\ScooterUpdates;
use App\Events\TripBegins;
use App\Events\TripEnds;
use App\Events\TripUpdates;
use App\Http\Requests\StartTripRequest;
use App\Http\Requests\StopTripRequest;
use App\Http\Requests\StoreTripRequest;
use App\Models\Scooter;
use App\Models\Trip;
use App\Traits\ResponseAPI;
// use MatanYadaev\EloquentSpatial\Objects\Point;
use TarfinLabs\LaravelSpatial\Types\Point;

class TripRepository implements TripRepositoryInterface
{
    use ResponseAPI;
    protected $trip;

    public function __construct(Trip $trip)
    {
        $this->trip = $trip;
    }

    public function startScooterTrip(StartTripRequest $request, int $id = null)
    {
        // dd($request);


        try {

            $scooter = Scooter::where([['id', $request->scooter_id], ['status', 1]])->first();
            if ($scooter != null) {
                $msg = "Scooter " . $request->scooter_id . " is busy";
                // return [];
                return $this->error($msg, 403);
            }

            $client = Trip::where([['client_id', $request->client_id], ['status', 1]])->first();
        // dd($request);
        if ($client != null) {
                $msg = "This Client with ID " . $request->client_id . " is on a trip";
                // return [];
                return $this->error($msg, 403);
            }


            $query = $this->trip->query()->create([
                'scooter_id' => $request->scooter_id,
                'client_id' => $request->client_id,
                'start_location' => new Point(lat: $request->startLatitude, lng: $request->startLongitude),
                'current_location' => new Point(lat: $request->startLatitude, lng: $request->startLongitude),
                'stop_location' => new Point(lat: 0, lng: 0),
                'status' => 1,

            ]);

            //Event
            TripBegins::dispatch($request->scooter_id);
 
            return $this->success("Trip Started", $query, 200);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), 403);
        }
    }

    public function stopScooterTrip(StopTripRequest $request, int $id)
    {
        try {
            $trip = Trip::find($id);
            $trip->stop_location = new Point(lat: $request->endLatitude, lng: $request->endLongitude);
            $trip->status = 0;
            $trip->update();

            //Event
            TripEnds::dispatch($request->scooter_id);
            ScooterUpdates::dispatch($request->scooter_id,$request->endLatitude, $request->endLongitude);


            return $this->success("Trip Ended", $trip, 200);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), 403);
        }
    }

    public function updateScooterTrip(int $scooter_id)
    {
        try {
            $trip = Trip::where('scooter_id', $scooter_id)->latest('id')->first();
            if ($trip->status == 0) {
                return $this->error("This trip has ended and cannot be updated", 403);
            }

            $currLat = $trip['current_location']->getLat() + 0.11; //updating current Latitude by 0.11points every 11 seconds
            $currLng = $trip['current_location']->getLng() + 0.11; //updating current Longitude by 0.11points every 11 seconds

            $updateTrip = Trip::find($trip['id']);
            $updateTrip->current_location = new Point(lat: $currLat, lng: $currLng);
            $updateTrip->update();

            // $updateScooter = Scooter::find($scooter_id);
            // dd($updateScooter);
            // $updateScooter->location = new Point(lat: $currLat, lng: $currLng);
            // $updateScooter->update();

            //Event
            TripUpdates::dispatch($scooter_id);

            return $this->success("Location Update for Scooter " . $trip['scooter_id'], $trip, 200);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), 403);
        }
    }
}
