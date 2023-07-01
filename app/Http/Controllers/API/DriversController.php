<?php

namespace App\Http\Controllers\API;

use App\DirverInfo;
use App\Http\Controllers\Controller;
use App\Traits\DriverTrait;
use App\Traits\userTrait;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DriversController extends Controller
{
    use DriverTrait, userTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
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
    public function get_drivers()
    {
        $user = auth('sanctum')->user();
        $drivers = $user->drivers;
        return $this->sendResponse('returned Drivers', $drivers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $driver = User::with('driver_info')->find($id);
            if ($driver->parent_id == auth('sanctum')->id()) {
                return $this->sendResponse('Driver Deleted successfully.', $driver);
            } else {
                throw new \Exception("");
            }
        } catch (\Throwable $th) {
            return $this->sendError('Unknown Error Occured');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'first_name' => 'required|max:255',
                'middle_name' => 'required|max:255',
                'last_name' => 'required|max:255',
                'phone' => 'required',
                'email' => 'required|unique:users,email,' . $id . ',id',
                'license_no' => 'required',
                'license_issue_date' => 'required',
                'license_exp_date' => 'required',
                'profile_image' => 'nullable|mimes:jpeg,png,jpg,gif,svg,webp',
                'license_img_front' => 'nullable|mimes:jpeg,png,jpg,gif,svg,webp',
                'license_img_back' => 'nullable|mimes:jpeg,png,jpg,gif,svg,webp',
                'address' => 'required',
                'gender' => 'required',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors()->first());
            }
            $user = User::find($id);
            if ($user->parent_id == auth('sanctum')->id()) {
                $user = $this->save_user($user, $request, 'driver', 'edit');
                $driver =  DirverInfo::where('user_id', $id)->first();
                $driver = $this->driver_info_save($driver, $request, $user->id, 'edit');
            } else {
                throw new \Exception("");
            }
            return $this->sendResponse('Driver Updated successfully.', $user);
        } catch (\Throwable $th) {
            return $this->sendError('Unknown Error Occured');
        }
    }
    public function change_password(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'password' => 'required',
                'confirm_password' => 'required|same:password',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors()->first());
            }
            $user = User::find($id);
            if ($user->parent_id == auth('sanctum')->id()) {
                $user->password = bcrypt($request->password);
            } else {
                throw new \Exception("");
            }
            return $this->sendResponse('Password Changed successfully.',null);
        } catch (\Throwable $th) {
            return $this->sendError('Unknown Error Occured');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $driver = User::find($id);
            if ($driver->parent_id == auth('sanctum')->id()) {
                $this->delete_image($driver->profile_image);
                $this->delete_license('back', $driver->driver_info->license_img_back);
                $this->delete_license('front', $driver->driver_info->license_img_front);
                $driver->driver_info->delete();
                $driver->delete();
                return $this->sendResponse('Driver Deleted successfully.', null);
            } else {
                throw new \Exception("");
            }
        } catch (\Throwable $th) {
            return $this->sendError('Unknown Error Occured');
        }
    }
}
