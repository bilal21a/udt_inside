<?php

namespace App\Traits;

use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

trait DriverTrait
{
    public function save_driver($user, $request, $type = null)
    {
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->middle_name = $request->middle_name;
        $user->role = "driver";
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->cnic = $request->cnic;
        if ($request->hasFile('profile_image')) {
            if ($type != null) {
                $this->delete_image($user->profile_image);
            }
            $file = $request->file('profile_image');
            $filename = 'customer_' . rand() . '.' . $file->getClientOriginalExtension();
            $user->profile_image = $filename;
            $file->storeAs('public/customer/', $filename);
        }
        if ($type == null) {
            $user->parent_id = $request->customer;
        }
        $user->address = $request->address;
        $user->gender = $request->gender;
        $user->save();

        return $user;
    }

    public function delete_image($path)
    {
        if (Storage::exists('public/customer/' . $path)) {
            Storage::delete('public/customer/' . $path);
        }
    }
    public function delete_license($dir,$path)
    {

        if (Storage::exists('public/driver/license_'.$dir.'/' . $path)) {
            Storage::delete('public/driver/license_'.$dir.'/' . $path);
        }
    }
    public function save_license($dir,$driver,$request,$db_img_name,$type=null)
    {
        if ($request->hasFile('license_img_'.$dir.'')) {
            if ($type != null) {
                $this->delete_license($dir,$driver->$db_img_name);
            }
            $file = $request->file('license_img_'.$dir.'');
            $filename = 'driver_' . rand() . '.' . $file->getClientOriginalExtension();
            $driver->$db_img_name = $filename;
            $file->storeAs('public/driver/license_'.$dir.'/', $filename);
        }
    }


    public function driver_info_save($driver, $request, $user_id, $type = null)
    {
        $driver->license_no = $request->license_no;
        $driver->license_issue_date = Carbon::parse($request->license_issue_date);
        $driver->license_exp_date = Carbon::parse($request->license_exp_date);
        $this->save_license('front',$driver,$request,'license_img_front',$type);
        $this->save_license('back',$driver,$request,'license_img_back',$type);
        $driver->user_id = $user_id;
        $driver->save();
        return $driver;
    }
}
