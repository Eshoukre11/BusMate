<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\company_notification;
use App\Models\drivers_notification;
use App\Models\student_notification;
use App\Models\university_notification;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class notification extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    public function companies_not()
    {
        return $this->hasMany(company_notification::class);
    }
    public function driver_not()
    {
        return $this->hasMany(drivers_notification::class);
    }
    public function student_not()
    {
        return $this->hasMany(student_notification::class);
    }
    public function university_not()
    {
        return $this->hasMany(university_notification::class);
    }
}
