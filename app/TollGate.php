<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TollGate extends Model
{
    protected $appends = ['toll_gate_image_url'];

    public function serviceProvider()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function getTollGateImageUrlAttribute()
    {
        return asset('storage/toll_gate_images/' . $this->image);
    }
}
