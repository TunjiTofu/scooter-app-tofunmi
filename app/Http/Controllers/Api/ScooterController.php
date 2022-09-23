<?php

namespace App\Http\Controllers\Api;

use App\Events\TripBegins;
use App\Events\TripEnds; 
use App\Http\Controllers\Controller;
use App\Http\Requests\AddScooterRequest;
use App\Http\Requests\ClientScooterRequest;
use App\Models\Scooter;
use App\Repository\IScooterRepository;
use App\Repository\ScooterRepositoryInterface;
use App\Services\ScooterService;
use Illuminate\Http\Request;

class ScooterController extends Controller
{

    public $scooterService;

    public function __construct(ScooterService $scooterService)
    {
        $this->scooterService = $scooterService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $scooters = $this->scooter->getAllScooters();
        // return response()->json([
        //     'scooters' => $scooters
        // ], 200);
    } 

    public function clientLocateScooters(ClientScooterRequest $request)
    {
       return $this->scooterService->locateScooter($request);  

        // $scooter = $this->scooter->startScooterTrip($uuid);
        //TripBegins::dispatch($scooter->id); 
        // return response()->json([
        //     'scooterDetails' => $scooter
        // ], 200);
    }

    public function end($uuid)
    {
        // $scooter = $this->scooter->startScooterTrip($uuid);
        // TripEnds::dispatch($scooter->id);
        // return response()->json([
        //     'scooterDetails' => $scooter
        // ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            // 
        ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        TripBegins::dispatch($request->input('email'));
        return $request->input('email');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Scooter  $scooter
     * @return \Illuminate\Http\Response
     */
    public function show(Scooter $scooter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Scooter  $scooter
     * @return \Illuminate\Http\Response
     */
    public function edit(Scooter $scooter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Scooter  $scooter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Scooter $scooter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Scooter  $scooter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Scooter $scooter)
    {
        //
    }
}
