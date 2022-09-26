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
            $tripObject = $this->getTrip($clientId, $scooterId);

            if (empty($tripObject)) {
                $message = "This Trip is yet to Begin";
                return $this->buildErrorResponse($message, 403);
            }

            $tripEnded = $this->isTripEnded($clientId, $scooterId);
            if ($tripEnded) {
                $message = "This Trip Has Ended and It is Inactive";
                return $this->buildErrorResponse($message, 403);
            }
            $tripObject->end_location = new Point(lat: $request->endLatitude, lng: $request->endLongitude);
            $tripObject->status = 0;
            $tripObject->save();

            //Event
            TripEnds::dispatch($clientId, $scooterId, $request->endLatitude, $request->endLongitude);

            return $this->buildSuccessResponse("Trip Ended", $tripObject, 200);
        } catch (\Throwable $exception) {
            return $this->buildErrorResponse($exception->getMessage(), 403);
        }
    }

    public function updateTrip(string $scooter_id)
    {
        try {
            $tripObject = $this->getTripByScooterId($scooter_id);
            if (empty($tripObject)) {
                return $this->buildErrorResponse('This Scooter is not on a trip. Its location can not be updated', 403);
            }

            if ($tripObject->status == 0) {
                return $this->buildErrorResponse('This trip has ended and cannot be updated', 403);
            }

            $currLat = $tripObject->current_location->getLat() + 0.11; //updating current Latitude by 0.11points every 11 seconds
            $currLng = $tripObject->current_location->getLng() + 0.11; //updating current Longitude by 0.11points every 11 seconds

            $tripObject->current_location = new Point(lat: $currLat, lng: $currLng);
            $tripObject->update();

            //Event
            TripUpdates::dispatch($scooter_id);

            return $this->buildSuccessResponse("Location Update for Scooter " . $tripObject->scooter_id, $tripObject, 200);
        } catch (\Throwable $exception) {
            return $this->buildErrorResponse($exception->getMessage(), 403);
        }
    }

    private function getTripByScooterId(string $scooter_id)
    {
        return Trip::where([
            ['scooter_uuid', $scooter_id],
        ])->latest()->first();
    }

    private function getTrip(string $client_id, string $scooter_id)
    {
        return Trip::where([
            ['client_uuid', $client_id],
            ['scooter_uuid', $scooter_id],
        ])->latest()->first();
    }

    private function isTripEnded(string $client_id, string $scooter_id)
    {
        return Trip::where([
            ['client_uuid', $client_id],
            ['scooter_uuid', $scooter_id],
            ['status', 0]
        ])->latest()->first();
    }
}
