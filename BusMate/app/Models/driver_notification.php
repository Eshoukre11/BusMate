<?php

namespace App\Models;

use App\Models\Driver;
use App\Models\Notification;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class driver_notification extends Model
{
    use HasFactory;
    protected $fillable = [
        'notification_id',
        'driver_id'
    ];
    protected $primaryKey = 'dnotification_id';
    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }
    public function notification()
    {
        return $this->belongsTo(Notification::class);
    }
}
