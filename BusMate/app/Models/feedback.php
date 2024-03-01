<?php

namespace App\Models;

use App\models\driver_feedback;
use App\models\subscriber_feedback;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class feedback extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'contant',
        'type',
        'state'
    ];

    protected $primaryKey = 'feedback_id';
    public function driver_feedback()
    {
        return $this->hasMany(driver_feedback::class);
    }
    public function subscriber_feedback()
    {
        return $this->hasMany(subscriber_feedback::class);
    }
}
