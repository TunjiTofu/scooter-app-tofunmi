<?php

namespace App\Repository;

use App\Events\ScooterUpdates;
use App\Events\TripBegins;
use App\Events\TripEnds;
use App\Events\TripUpdates;
use App\Http\Requests\StartTripRequest;
use App\Http\Requests\StopTripRequest;
use App\Models\Scooter;
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
            $isScooterBusy = $this->isScooterBusy($request->scooter_id);
            if ($isScooterBusy) {
                $message = "Scooter " . $request->scooter_id . " is busy";
                return $this->buildErrorResponse($message, 403);
            }

            $isClientBusy = $this->isClientBusy($request->client_id);
            if ($isClientBusy) {
                $message = "This Client with ID " . $request->client_id . " is on a trip";
                return $this->buildErrorResponse($message, 403);
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

            return $this->buildSuccessResponse("Trip Started", $query, 200);
        } catch (\Throwable $exception) {
            return $this->buildErrorResponse($exception->getMessage(), 403);
        }
    }

    public function stopTrip(StopTripRequest $request)
    {
        try {
            $trip = Trip::find($request->trip_id);
            $trip->stop_location = new Point(lat: $request->endLatitude, lng: $request->endLongitude);
            $trip->status = 0;
            $trip->update();

            //Event
            TripEnds::dispatch($request->scooter_id);
            ScooterUpdates::dispatch($request->scooter_id, $request->endLatitude, $request->endLongitude);

            return $this->buildSuccessResponse("Trip Ended", $trip, 200);
        } catch (\Throwable $exception) {
            return $this->buildErrorResponse($exception->getMessage(), 403);
        }
    }

    public function updateTrip(int $scooter_id)
    {
        try {
            $trip = Trip::where('scooter_id', $scooter_id)->latest('id')->first();
            if ($trip->status == 0) {
                return $this->buildErrorResponse("This trip has ended and cannot be updated", 403);
            }

            $currLat = $trip['current_location']->getLat() + 0.11; //updating current Latitude by 0.11points every 11 seconds
            $currLng = $trip['current_location']->getLng() + 0.11; //updating current Longitude by 0.11points every 11 seconds

            $updateTrip = Trip::find($trip['id']);
            $updateTrip->current_location = new Point(lat: $currLat, lng: $currLng);
            $updateTrip->update();

            //Event
            TripUpdates::dispatch($scooter_id);

            return $this->buildSuccessResponse("Location Update for Scooter " . $trip['scooter_id'], $trip, 200);
        } catch (\Throwable $exception) {
            return $this->buildErrorResponse($exception->getMessage(), 403);
        }
    }

    private function isScooterBusy(int $scooterId)
    {
        return Scooter::where([
            ['id', $scooterId],
            ['status', 1]
        ])->exists();
    }

    private function isClientBusy(int $clientId)
    {
        return Trip::where([
            ['client_id', $clientId],
            ['status', 1]
        ])->exists();
    }
}
