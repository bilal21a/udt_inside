<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = ['make', 'color', 'model', 'engine_type', 'year', 'avg_kmpg', 'license_plate', 'license_no','license_expiry_date', 'pessenger_capacity', 'status', 'vehicle_image'];
    protected $casts =  [
        'status' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsToMany(User::class, 'vehicle_driver', 'vehicle_id', 'user_id');
    }
}
