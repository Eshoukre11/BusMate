<?php

namespace App\Models;

use App\Models\Driver;
use App\Models\feedback;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class driver_feedback extends Model
{
    use HasFactory;
    protected $fillable = [
        'feedback_id',
        'driver_id'
    ];
    protected $primaryKey = 'dfeedback_id';
    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }
    public function feedback()
    {
        return $this->belongsTo(feedback::class);
    }
}
