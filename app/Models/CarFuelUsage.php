<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarFuelUsage extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public function fuel_type()
    {
        return $this->belongsTo(FuelType::class);
    }
}
