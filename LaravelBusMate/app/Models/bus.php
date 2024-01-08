<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\driver;
use App\Models\company;
use App\Models\bus_trip;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class bus extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    public function driver()
    {
        return $this->belongsTo(driver::class);
    }

    public function bus_trip()
    {
        return $this->hasMany(bus_trip::class);
    }
    public function company()
    {
        return $this->hasMany(company::class);
    }
}
