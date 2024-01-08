<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\company;
use App\Models\notification;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class company_notification extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    public function company()
    {
        return $this->belongsTo(company::class);
    }

    public function notification()
    {
        return $this->belongsTo(notification::class);
    }
}
