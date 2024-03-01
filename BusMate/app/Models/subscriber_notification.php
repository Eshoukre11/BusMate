<?php

namespace App\Models;

use App\models\Notification;
use App\models\subscriber;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subscriber_notification extends Model
{
    use HasFactory;
    protected $fillable = [
        'notification_id',
        'subscriber_id'
    ];

    protected $primaryKey = 'snotification_id';
    public function notification()
    {
        return $this->belongsTo(Notification::class);
    }
    public function subscriber()
    {
        return $this->belongsTo(subscriber::class);
    }
}
