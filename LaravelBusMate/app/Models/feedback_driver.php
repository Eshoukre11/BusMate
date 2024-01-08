<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\driver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class feedback_driver extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    public function driver()
    {
        return $this->belongsTo(driver::class);
    }
}
