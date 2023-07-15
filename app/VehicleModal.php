<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VehicleModal extends Model
{
    protected $appends = ['image_url'];
    
    public function vehicle_make()
    {
        return $this->belongsTo(VehicleMake::class);
    }

    public function getImageUrlAttribute()
    {
        return asset('storage/vehicle_modal/' . $this->image);
    }
}
