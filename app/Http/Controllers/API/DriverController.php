<?php

namespace App\Http\Controllers\API;

use App\DirverInfo;
use App\Http\Controllers\Controller;
use App\Traits\DriverTrait;
use App\Traits\userTrait;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DriverController extends Controller
{
    use DriverTrait,userTrait;
    public function add_driver(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|max:255',
            'middle_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'phone' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
            'license_no' => 'required',
            'license_issue_date' => 'required',
            'license_exp_date' => 'required',
            'profile_image' => 'required|mimes:jpeg,png,jpg,gif,svg,webp',
            'license_img_front' => 'required|mimes:jpeg,png,jpg,gif,svg,webp',
            'license_img_back' => 'required|mimes:jpeg,png,jpg,gif,svg,webp',
            'address' => 'required',
            'gender' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors()->first());
        }

        $request['customer'] = auth('sanctum')->id();
        $user = new User();
        $user = $this->save_user($user, $request, 'driver');
        $driver = new DirverInfo();
        $driver = $this->driver_info_save($driver, $request, $user->id);
        return $this->sendResponse('Driver Added successfully.', $user);
    }
    public function get_drivers()
    {
        $user = auth('sanctum')->user();
        $drivers = $user->drivers;
        return $this->sendResponse('returned Drivers', $drivers);
    }
}
