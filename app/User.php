<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

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
    ];

    public function vehicles()
    {
        return $this->belongsToMany(Vehicle::class, 'vehicle_driver', 'user_id', 'vehicle_id');
    }

    public function driverInfo()
    {
        return $this->hasOne(DriverInfo::class);
    }

    public function fuelPumps()
    {
        return $this->hasOne(FuelPumps::class);
    }
}
