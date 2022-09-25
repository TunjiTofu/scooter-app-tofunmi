<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use MatanYadaev\EloquentSpatial\SpatialBuilder;
// use MatanYadaev\EloquentSpatial\Objects\Point;
use TarfinLabs\LaravelSpatial\Casts\LocationCast;
use TarfinLabs\LaravelSpatial\Traits\HasSpatial;

class Trip extends Model
{
    use HasFactory;
    use HasSpatial;

    protected $hidden = [
        'id'
    ];

    protected $fillable = [
        'uuid',
        'scooter_id',
        'client_id',
        'start_location',
        'current_location',
        'end_location',
        'status'
    ];

    protected $casts  = [
        'start_location' => LocationCast::class,
        'current_location' => LocationCast::class,
        'end_location' => LocationCast::class,
    ];

    // public function newEloquentBuilder($query): SpatialBuilder
    // {
    //     return new SpatialBuilder($query);
    // }

    public function scooter()
    {
        return $this->belongsTo(Scooter::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
