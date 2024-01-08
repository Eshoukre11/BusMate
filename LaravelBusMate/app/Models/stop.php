<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\route;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class stop extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    public function routes()
    {
        return $this->hasMany(route::class);
    }
}
