<?php

namespace App\Models;

use App\Models\Bus;
use App\Models\contract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class company extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_name',
        'company_address',
        'comunication_email',
        'phone_number',
        'company_website'

    ];
    protected $primaryKey = 'company_id';
    public function bus()
    {
        return $this->hasmany(Bus::class);
    }
    public function contract(){
        return $this->hasmany(contract::class);
    }
}
