<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\route;
use App\Models\bus_trip;
use App\Models\semester;
use App\Models\driver_trip;
use App\Models\student_trip;
use App\Models\university_staff_trip;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class trip extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    public function bus_trip()
    {
        return $this->hasMany(bus_trip::class);
    }
    public function driver_trip()
    {
        return $this->hasMany(driver_trip::class);
    }
    public function semester()
    {
        return $this->hasMany(semester::class);
    }
    public function student_trip()
    {
        return $this->hasMany(student_trip::class);
    }
    public function routes()
    {
        return $this->belongsTo(route::class);
    }
    public function un_staff_trip()
    {
        return $this->hasMany(university_staff_trip::class);
    }
}
