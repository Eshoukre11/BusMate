<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\trip;
use App\Models\university_staff;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class university_staff_trip extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    public function trips()
    {
        return $this->belongsTo(trip::class);
    }
    public function un_staff()
    {
        return $this->belongsTo(university_staff::class);
    }
}
