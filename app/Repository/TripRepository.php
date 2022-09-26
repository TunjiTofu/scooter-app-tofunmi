<?php

namespace App\Repository;

use App\Events\TripBegins;
use App\Events\TripEnds;
use App\Events\TripUpdates;
use App\Http\Requests\StartTripRequest;
use App\Http\Requests\StopTripRequest;
use App\Models\Trip;
use App\Traits\ResponseAPI;
use TarfinLabs\LaravelSpatial\Types\Point;

class TripRepository implements TripRepositoryInterface
{
    use ResponseAPI;
    protected Trip $trip;

    public function __construct(Trip $trip)
    {
        $this->trip = $trip;
    }

    public function startTrip(StartTripRequest $request)
    {
        try {
            $query = $this->trip->query()->create([
                'scooter_uuid' => $request->scooter_id,
                'client_uuid' => $request->client_id,
                'start_location' => new Point(lat: $request->startLatitude, lng: $request->startLongitude),
                'current_location' => new Point(lat: $request->startLatitude, lng: $request->startLongitude),
                'end_location' => new Point(lat: 0, lng: 0),
                'status' => 1,
            ]);

            //Event
            TripBegins::dispatch($request->scooter_id, $request->client_id);

            return $this->buildSuccessResponse("Trip Started", $query, 200);
        } catch (\Throwable $exception) {
            return $this->buildErrorResponse($exception->getMessage(), 403);
        }
    }

    public function stopTrip(StopTripRequest $request)
    {
        try {
            $clientId = $request->client_id;
            $scooterId = $request->scooter_id;
            $tripExist = $this->tripExist($clientId, $scooterId);


            if (!$tripExist) {
                $message = "This Trip is yet to Begin";
                return $this->buildErrorResponse($message, 403);
            }

            $tripEnded = $this->tripEnded($clientId, $scooterId);
            if ($tripEnded->status == 0) {
                $message = "This Trip Has Ended and It is Inactive";
                return $this->buildErrorResponse($message, 403);
            }
            $trip = Trip::where('client_uuid', $clientId)->where('scooter_uuid', $scooterId)->latest()->first();

            $tripUpdate = Trip::find($trip->id);
            $tripUpdate->end_location = new Point(lat: $request->endLatitude, lng: $request->endLongitude);
            $tripUpdate->status = 0;
            $tripUpdate->save();

            //Event
            TripEnds::dispatch($clientId, $scooterId, $request->endLatitude, $request->endLongitude);

            return $this->buildSuccessResponse("Trip Ended", $tripUpdate, 200);
        } catch (\Throwable $exception) {
            return $this->buildErrorResponse($exception->getMessage(), 403);
        }
    }

    public function updateTrip(string $scooter_id)
    {
        try {
            $scooterOnTrip = $this->isScooterOnTrip($scooter_id);
            if (!$scooterOnTrip) {
                return $this->buildErrorResponse('This Scooter is not on a trip. Its location can not be updated', 403);
            }

            if ($scooterOnTrip->status == 0) {
                return $this->buildErrorResponse('This trip has ended and cannot be updated', 403);
            }

            $trip = Trip::where('scooter_uuid', $scooter_id)->latest('id')->first();
            $currLat = $trip['current_location']->getLat() + 0.11; //updating current Latitude by 0.11points every 11 seconds
            $currLng = $trip['current_location']->getLng() + 0.11; //updating current Longitude by 0.11points every 11 seconds

            $updateTrip = Trip::find($trip['id']);
            $updateTrip->current_location = new Point(lat: $currLat, lng: $currLng);
            $updateTrip->update();

            //Event
            TripUpdates::dispatch($scooter_id);

            return $this->buildSuccessResponse("Location Update for Scooter " . $trip['scooter_id'], $updateTrip, 200);
        } catch (\Throwable $exception) {
            return $this->buildErrorResponse($exception->getMessage(), 403);
        }
    }

    private function isScooterOnTrip(string $scooter_id)
    {
        return Trip::where([
            ['scooter_uuid', $scooter_id],
        ])->latest()->first();
    }

    private function tripExist(string $client_id, string $scooter_id)
    {
        return Trip::where([
            ['client_uuid', $client_id],
            ['scooter_uuid', $scooter_id],
        ])->exists();
    }

    private function tripEnded(string $client_id, string $scooter_id)
    {
        return Trip::where([
            ['client_uuid', $client_id],
            ['scooter_uuid', $scooter_id],
        ])->latest()->first();
    }
}
