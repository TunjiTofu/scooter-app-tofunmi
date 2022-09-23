<?php

namespace App\Repository;

use App\Http\Requests\ClientScooterRequest;
use App\Models\Scooter;
use App\Traits\ResponseAPI;
use TarfinLabs\LaravelSpatial\Types\Point;

class ScooterRepository implements ScooterRepositoryInterface
{
    use ResponseAPI;
    protected $trip;

    public function __construct(Scooter $trip)
    {
        $this->trip = $trip;
    }
    
    public function locateScooterForClient(ClientScooterRequest $request)
    {
        //return Scooter::all();
        // dd($request);
        try {
            $query = Scooter::query()
            ->withinDistanceTo('location', new Point(lat: $request->clientCurrentLat, lng: $request->clientCurrentLng), $request->radius)
            ->orderBy('status')
            ->get();
    
            return $this->success("List of Scooters ".$request->radius. "KM from your Location" , $query, 200);
            // dd($query);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), 403);
        }

       

    }

    public function startScooterTrip($uuid)
    { 
        return Scooter::find($uuid); 
    }

    public function endScooterTrip($uuid)
    {
        return Scooter::find($uuid);
    }
}

?>