<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, HasRoles,HasApiTokens;

    protected $appends = ['full_name','profile_url'];
    protected $dates = ['deleted_at'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['first_name', 'last_name', 'middle_name', 'gender', 'phone', 'email', 'address', 'password', 'description', 'profile_image', 'parent_id', 'role', 'cnic',];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'status' => 'boolean',
    ];

    public function drivers_vehicles()
    {
        return $this->belongsToMany(Vehicle::class, 'vehicle_driver', 'user_id', 'vehicle_id');
    }
    public function customers_vehicles()
    {
        return $this->hasMany(Vehicle::class);
    }

    public function driver_info()
    {
        return $this->hasOne(DirverInfo::class);
    }

    public function fuelPumps()
    {
        return $this->hasOne(FuelPumps::class);
    }
    public function InsuranceCompany()
    {
        return $this->hasOne(FuelPumps::class);
    }
    public function drivers()
    {
        return $this->hasMany(User::class, 'parent_id');
    }
    public function customer()
    {
        return $this->belongsTo(User::class, 'parent_id');
    }

    // appends & getters
    public function getFullNameAttribute()
    {
        return $this->first_name.' '.$this->last_name;
    }
    public function getProfileUrlAttribute()
    {
        return asset('storage/user/' . $this->profile_image);
    }
}
