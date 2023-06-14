<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DirverInfo extends Model
{
    public function driver()
    {
        return $this->belongsTo(User::class);
    }}
