<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\universitie;
use App\Models\notification;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class university_notification extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    public function university()
    {
        return $this->belongsTo(universitie::class);
    }
    public function notification()
    {
        return $this->belongsTo(notification::class);
    }
}