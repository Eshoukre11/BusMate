<?php

namespace App\Models;

use App\Models\bus;
use App\Models\company;
use App\Models\driver_trip;
use App\Models\feedback_driver;
use App\Models\drivers_notification;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class driver extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    public function bus()
    {
        return $this->hasOne(bus::class);
    }
    public function company()
    {
        return $this->hasMany(company::class);
    }

    public function driver_trip()
    {
        return $this->hasMany(driver_trip::class);
    }
    public function driver_not()
    {
        return $this->hasMany(drivers_notification::class);
    }
    public function feedback_driver()
    {
        return $this->hasMany(feedback_driver::class);
    }
}
