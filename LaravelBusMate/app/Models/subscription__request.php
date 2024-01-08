<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\semester;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class subscription__request extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    public function semester()
    {
        return $this->hasMany(semester::class);
    }
}
