<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InsuranceCompany extends Model
{
    protected $appends = ['lisence_url'];

    public function serviceProvider()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function getLisenceUrlAttribute()
    {
        return asset('storage/insurance_company/' . $this->upload_license);

    }

}
