<?php

namespace App\Models;

use App\Models\Bus;
use App\Models\Trip_information;
use App\Models\driver_feedback;
use App\Models\driver_notification;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Driver extends Authenticatable implements JWTSubject
{
    use HasFactory;
    protected $fillable = [
        'subscriber_type',
        'driver_name',
        'driver_address',
        'driver_number',
        'email',
        'password',
        'license_number',
        'date_of_employment',
        'bus_id'
    ];
    protected $primaryKey = 'driver_id';
    public function bus()
    {
        return $this->belongsTo(Bus::class);
    }
    public function driver_feedback()
    {
        return $this->hasMany(driver_feedback::class);
    }
    public function driver_notification()
    {
        return $this->hasMany(driver_notification::class);
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
