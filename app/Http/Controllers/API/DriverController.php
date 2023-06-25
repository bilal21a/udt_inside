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
    use DriverTrait, userTrait;
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

    // datatable 
    public function get_drivers_data(Request $request)
    {
        $perPage = $request->input('perPage', 10); // Number of records per page
        $search = $request->input('search');
        $user_id = auth('sanctum')->id();
        $query = User::with('driver_info')->where('parent_id', $user_id);

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('first_name', 'LIKE', '%' . $search . '%')
                    ->orWhere('middle_name', 'LIKE', '%' . $search . '%')
                    ->orWhere('last_name', 'LIKE', '%' . $search . '%')
                    ->orWhere('phone', 'LIKE', '%' . $search . '%')
                    ->orWhere('email', 'LIKE', '%' . $search . '%')
                    ->orWhere('address', 'LIKE', '%' . $search . '%')
                    ->orWhere('gender', 'LIKE', '%' . $search . '%')
                    ->orWhereHas('driver_info', function ($q) use ($search) {
                        $q->where('license_no', 'LIKE', '%' . $search . '%')
                            ->orWhere('license_issue_date', 'LIKE', '%' . $search . '%')
                            ->orWhere('license_exp_date', 'LIKE', '%' . $search . '%');
                    });
            });
        }
        $data = $query->paginate($perPage);
        return response()->json([
            'data' => $data->items(),
            'pagination' => [
                'currentPage' => $data->currentPage(),
                'perPage' => $data->perPage(),
                'totalPages' => $data->lastPage(),
                'totalItems' => $data->total()
            ]
        ]);
    }
}
