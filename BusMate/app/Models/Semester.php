<?php

namespace App\Models;

use App\Models\trip;
use App\Models\year;
use App\Models\subscriber;
use App\Models\subscription_request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Semester extends Model
{
    use HasFactory;
    protected $fillable = [
        'semester_name',
        'semester_code',
        'start_date',
        'end_date',
        'year_id'

    ];

    protected $primaryKey = 'semester_id';
    public function year()
    {
        return $this->belongsTo(year::class);
    }
    public function subscriber()
    {
        return $this->hasMany(subscriber::class);
    }

    public function subscription_request()
    {
        return $this->hasMany(subscription_request::class);
    }
    public function trip()
    {
        return $this->hasMany(trip::class);
    }
}
