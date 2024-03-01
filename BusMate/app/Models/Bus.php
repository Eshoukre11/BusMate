<?php

namespace App\Models;

use App\Models\Driver;
use App\Models\company;
use App\Models\Trip_information;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bus extends Model
{
    use HasFactory;
    protected $fillable = [
        'bus_number',
        'bus_type',
        'bus_sign',
        'capacity',
        'company_id',

    ];
    protected $primaryKey = 'bus_id';
    public function company()
    {
        return $this->belongsTo(company::class);
    }

    public function driver()
    {
        return $this->hasMany(Driver::class);
    }

    public function trip_information()
    {
        return $this->hasMany(Trip_information::class);
    }
}
