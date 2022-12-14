<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory, HasUuids;

    protected $primaryKey = 'uuid';

    protected $hidden = [
        'id'
    ];
    
    protected $fillable = [
        'status',
    ];

    public function trips()
    {
        return $this->hasMany(Trip::class);
    }
}
