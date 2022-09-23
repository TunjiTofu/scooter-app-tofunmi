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
 

// Route::apiResource('scooter', ScooterController::class);
Route::get('/scooter', [ScooterController::class, 'index']);
Route::post('/client/scooters', [ScooterController::class, 'clientLocateScooters']); 

Route::post('/trip/start', [TripController::class, 'startTrip'])->name('trip.start');
Route::post('/trip/end', [TripController::class, 'endTrip']);
Route::get('/trip/update/{id}', [TripController::class, 'updateTrip']);

Route::get('/scooter-create', function(){
    Artisan::call('scooters:create --count=2');
    return "Scooter Created";
});

//new
//devmode
// Route::get('/scooter-update', function(){
//     Artisan::call('scooter:update 1');
//     return "Scooter Updated";
// });