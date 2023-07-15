<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VehicleMake extends Model
{
    protected $appends = ['image_url'];
    
    public function vehicle_modals()
    {
        return $this->hasMany(VehicleModal::class);
    }

    public function getImageUrlAttribute()
    {
        return asset('storage/vehicle_make/' . $this->image);
    }
}
