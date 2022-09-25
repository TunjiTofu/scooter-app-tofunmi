<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TarfinLabs\LaravelSpatial\Casts\LocationCast;
use TarfinLabs\LaravelSpatial\Traits\HasSpatial;

class Scooter extends Model
{
    
    use HasFactory;
    use HasUuids;
    use HasSpatial;

    protected $hidden = [
        'id'
    ];

    protected $fillable = [
        'status',
        'location',
    ];

    protected $casts  = [
        'location' => LocationCast::class,
    ];

    public function trips()
    {
        return $this->hasMany(Trip::class);
    }
}
