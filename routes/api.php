<?php

use App\Http\Controllers\Api\ScooterController;
use App\Http\Controllers\Api\TripController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
 
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
 

Route::get('/scooter', [ScooterController::class, 'index']);
Route::post('/client/scooters', [ScooterController::class, 'locateScooters']); 

Route::post('/trip/start', [TripController::class, 'startTrip'])->name('trip.start');
Route::post('/trip/end', [TripController::class, 'endTrip']);
Route::put('/trip/update/{id}', [TripController::class, 'updateTrip']);