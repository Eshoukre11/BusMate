<?php

namespace App\Models;

use App\Models\trip;
use App\Models\subscriber;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Tymon\JWTAuth\Contracts\JWTSubject;

class subscriber_trip extends Authenticatable implements JWTSubject
{
    use HasFactory;
    protected $fillable = [
        'trip_id',
        'subscriber_id',
        'QrCode'
    ];

    protected $primaryKey = 'subscriber_trip_id';
    public function trip()
    {
        return $this->belongsTo(trip::class);
    }
    public function subscriber()
    {
        return $this->belongsTo(subscriber::class);
    }






    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
