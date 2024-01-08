<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\university_staff;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barcode_university_staff extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    public function university()
    {
        return $this->belongsTo(university_staff::class);
    }
}
