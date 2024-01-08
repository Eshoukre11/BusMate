<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\trip;
use App\Models\student;
use App\Models\universitie;
use App\Models\university_staff;
use App\Models\subscription__request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class semester extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    public function subscrip()
    {
        return $this->belongsTo(subscription__request::class);
    }
    public function student()
    {
        return $this->belongsTo(student::class);
    }
    public function un_staff()
    {
        return $this->belongsTo(university_staff::class);
    }
    public function trip()
    {
        return $this->belongsTo(trip::class);
    }
    public function university()
    {
        return $this->belongsTo(universitie::class);
    }
}
