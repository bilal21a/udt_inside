<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = ['make', 'color', 'model', 'engine_type', 'year', 'avg_kmpg', 'no_plate', 'reg_no', 'pessenger_capacity', 'status', 'image'];

    public function user()
    {
        return $this->belongsToMany(User::class, 'vehicle_driver', 'vehicle_id', 'user_id');
    }
}
