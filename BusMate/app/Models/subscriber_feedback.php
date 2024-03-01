<?php

namespace App\Models;

use App\Models\feedback;
use App\Models\subscriber;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class subscriber_feedback extends Model
{
    use HasFactory;
    protected $fillable = [
        'feedback_id',
        'subscriber_id'
    ];

    protected $primaryKey = 'sfeedback_id';
    public function feedback()
    {
        return $this->belongsTo(feedback::class);
    }
    public function subscriber()
    {
        return $this->belongsTo(subscriber::class);
    }
}
