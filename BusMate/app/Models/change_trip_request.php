<?php

namespace App\Models;

use App\Models\subscriber;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class change_trip_request extends Model
{
    use HasFactory;
    protected $fillable = [
        'subscriber_id',
        'old_trip_number',
        'new_trip_number'
    ];
    protected $primaryKey = 'chtrequest_id';
    public function subscriber()
    {
        return $this->belongsTo(subscriber::class);
    }
}
