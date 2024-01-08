<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use App\Models\student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class barcode_student extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
   
    public function student()
    {
        return $this->belongsTo(student::class);
    }
}
