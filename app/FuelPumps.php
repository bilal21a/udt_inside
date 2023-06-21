<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FuelPumps extends Model
{
    public function serviceProvider()
    {
        return $this->belongsTo(User::class);
    }
}
