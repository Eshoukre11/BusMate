<?php

namespace App\Models;

use App\Models\year;
use App\Models\company;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class contract extends Model
{
    use HasFactory;
    protected $fillable = [
        'contract_number',
        'contract_price',
        'start_date',
        'end_date',
        'year_id',
        'company_id'
    ];
    protected $primaryKey = 'contract_id';
    public function year()
    {
        return $this->belongsTo(year::class);
    }
    public function company()
    {
        return $this->belongsTo(company::class);
    }
}
