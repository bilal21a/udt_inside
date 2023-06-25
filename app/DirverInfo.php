<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DirverInfo extends Model
{
    protected $table = 'driver_infos';
    protected $appends = ['license_img_front_url','license_img_back_url'];


    public function driver()
    {
        return $this->belongsTo(User::class);
    }
    public function getLicenseImgFrontUrlAttribute()
    {
        return asset('storage/driver/license_front/' . $this->license_img_front);
    }
    public function getLicenseImgBackUrlAttribute()
    {
        return asset('storage/driver/license_back/' . $this->license_img_back);
    }
}
