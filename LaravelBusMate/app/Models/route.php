<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\stop;
use App\Models\trip;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class route extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    public function stop()
    {
        return $this->belongsTo(stop::class);
    }
    public function trips()
    {
        return $this->hasMany(trip::class);
    }
}
