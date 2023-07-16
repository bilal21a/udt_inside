<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TollGate extends Model
{
    protected $appends = ['toll_gate_image_url'];
    
    public function getTollGateImageUrlAttribute()
    {
        return asset('storage/toll_gate_images/' . $this->image);
    }
}
