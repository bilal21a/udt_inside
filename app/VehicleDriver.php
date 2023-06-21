<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VehicleDriver extends Model
{
    protected $table = "vehicle_driver";
    public $timestamps = false;

    public function driver()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

}
