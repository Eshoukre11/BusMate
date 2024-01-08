<?php

namespace App\Models;

use App\Models\semester;
use App\Models\barcode_university_staff;
use App\Models\feedback_university_staff;
use App\Models\university_staff_trip;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class university_staff extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    public function barcode()
    {
        return $this->hasOne(barcode_university_staff::class);
    }
    public function feedback()
    {
        return $this->hasMany(feedback_university_staff::class);
    }
    public function semester()
    {
        return $this->hasMany(semester::class);
    }
    public function un_staff_trip()
    {
        return $this->hasMany(university_staff_trip::class);
    }
}
