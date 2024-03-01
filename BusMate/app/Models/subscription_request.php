<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subscription_request extends Model
{
    use HasFactory;
    protected $fillable = [

        'subscriber_type',
        'full_name',
        'college',
        'college_number',
        'phone',
        'email',
        'password',
        'semester_id',
    ];

    protected $primaryKey = 'srequest_id';
    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }
}
