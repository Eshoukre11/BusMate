<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\semester;
use App\Models\university_notification;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class universitie  extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
        'universities_name',
        'name',
        'email',
        'password',
    ];

    public function semester()
    {
        return $this->hasMany(semester::class);
    }
    public function university_not()
    {
        return $this->hasMany(university_notification::class);
    }
}
