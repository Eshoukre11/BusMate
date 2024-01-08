<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\semester;
use App\Models\barcode_student;
use App\Models\feedback_student;
use App\Models\student_notification;
use App\Models\student_trip;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class student extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    public function barcode()
    {
        return $this->hasOne(barcode_student::class);
    }
    public function feedback()
    {
        return $this->hasMany(feedback_student::class);
    }
    public function semester()
    {
        return $this->hasMany(semester::class);
    }
    public function student_not()
    {
        return $this->hasMany(student_notification::class);
    }
    public function student_trip()
    {
        return $this->hasMany(student_trip::class);
    }
}
