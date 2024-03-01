<?php

namespace App\Models;

use App\Models\Bus;
use App\Models\trip;
use App\Models\Driver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Trip_information extends Model
{
    use HasFactory;
    protected $fillable = [
        'trip_id',
        'bus_id',
        'driver_id'
    ];

    protected $primaryKey = 'tinformation_id';
    public function trip()
    {
        return $this->belongsTo(trip::class);
    }

    public function bus()
    {
        return $this->belongsTo(Bus::class);
    }
}
