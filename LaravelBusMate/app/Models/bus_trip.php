<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\bus;
use App\Models\trip;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class bus_trip extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    public function trip()
    {
        return $this->belongsTo(trip::class);
    }
    public function bus()
    {
        return $this->belongsTo(bus::class);
    }
}
