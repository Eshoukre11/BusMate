<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\trip;
use App\Models\student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class student_trip extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    public function student()
    {
        return $this->belongsTo(student::class);
    }
    public function trips()
    {
        return $this->belongsTo(trip::class);
    }
}
