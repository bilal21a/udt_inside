<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DirverInfo extends Model
{
    protected $table = 'driver_infos';

    public function driver()
    {
        return $this->belongsTo(User::class);
    }}
