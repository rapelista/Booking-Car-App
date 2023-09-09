<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    protected $with = [
        'car', 'driver', 'approvers', 'approvals',
    ];

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }

    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    public function approvers()
    {
        return $this->belongsToMany(User::class, 'approvals', 'booking_id', 'user_id');
    }

    public function approvals()
    {
        return $this->hasMany(Approval::class);
    }

    public function is_approved_by_all()
    {
        $status = true;

        foreach ($this->approvals as $approval) {
            $status &= $approval->is_approved;
        }

        return $status;
    }

    public function fuel_usages()
    {
        return $this->hasMany(CarFuelUsage::class);
    }
}
