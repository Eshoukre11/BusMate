<?php

namespace App\Models;

use App\Models\Semester;
use App\Models\subscriber_trip;
use App\Models\subscriber_notification;
use App\Models\subscriber_feedback;
use App\Models\change_trip_request;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class subscriber extends Authenticatable implements JWTSubject
{
    use HasFactory;
    protected $fillable = [
        'subscriber_type',
        'full_name',
        'college',
        'college_number',
        'phone',
        'email',
        'password',
        'subscriber_state',
        'semester_id',
    ];

    protected $primaryKey = 'subscriber_id';
    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }
    public function subscriber_trip()
    {
        return $this->hasMany(subscriber_trip::class);
    }

    public function subscriber_notification()
    {
        return $this->hasMany(subscriber_notification::class);
    }
    public function subscriber_feedback()
    {
        return $this->hasMany(subscriber_feedback::class);
    }

    public function change_trip_request()
    {
        return $this->hasMany(change_trip_request::class);
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
