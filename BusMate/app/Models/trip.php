<?php

namespace App\Models;

use App\Models\Semester;
use App\Models\Trip_information;
use App\Models\Trip_stop;
use App\Models\subscriber_trip;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class trip extends Model
{
    use HasFactory;
    protected $fillable = [
        'trip_number',
        'trip_type',
        'start_point',
        'end_point',
        'trip_day',
        'start_time',
        'stops',
        'semester_id'
    ];

    protected $primaryKey = 'trip_id';
    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }

    public function trip_information()
    {
        return $this->hasMany(Trip_information::class);
    }

    public function subscriber_trip()
    {
        return $this->hasMany(subscriber_trip::class);
    }
}
