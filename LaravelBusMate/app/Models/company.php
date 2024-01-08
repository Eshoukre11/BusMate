<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\bus;
use App\Models\driver;
use App\Models\company_notification;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class company extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    public function companies_not()
    {
        return $this->hasMany(company_notification::class);
    }
    public function bus()
    {
        return $this->belongsTo(bus::class);
    }
    public function driver()
    {
        return $this->belongsTo(driver::class);
    }
}
