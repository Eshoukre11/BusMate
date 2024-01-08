<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\trip;
use App\Models\driver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class driver_trip extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    public function driver()
    {
        return $this->belongsTo(driver::class);
    }

    public function trip()
    {
        return $this->belongsTo(trip::class);
    }
}
