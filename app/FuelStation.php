<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FuelStation extends Model
{
    protected $appends = ['approval_certificate_image_url', 'fuel_station_image_url'];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_petrol' => 'boolean',
        'is_diesel' => 'boolean',
        'is_hi_oct' => 'boolean',
    ];

    public function serviceProvider()
    {
        return $this->belongsTo(User::class);
    }

    //append
    public function getApprovalCertificateImageUrlAttribute()
    {
        return asset('storage/fuel_station/certificate/' . $this->approval_certificate_image);
    }
    public function getFuelStationImageUrlAttribute()
    {
        return asset('storage/fuel_station/image/' . $this->fuel_station_image);
    }
}
