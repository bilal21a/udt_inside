<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InsuranceCompany extends Model
{
    protected $appends = ['lisence_url'];
    protected $casts = [
        'type_insurance_service' => 'array',
        'type_insurance_plan' => 'array',
    ];
    public function serviceProvider()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function getLisenceUrlAttribute()
    {
        return asset('storage/insurance_company/' . $this->upload_license);

    }

}
