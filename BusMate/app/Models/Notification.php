<?php

namespace App\Models;

use App\models\driver_notification;
use App\models\subscriber_notification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'contant',
        'recipient_type',
        'state'
    ];

    protected $primaryKey = 'notification_id';
    public function driver_notification()
    {
        return $this->hasMany(driver_notification::class);
    }
    public function subscriber_notification()
    {
        return $this->hasMany(subscriber_notification::class);
    }
}
