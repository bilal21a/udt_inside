<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Traits\VehicleTrait;
use App\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VehiclesController extends Controller
{
    use VehicleTrait;
    public function add_vehicle(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'make' => 'required',
            'color' => 'required',
            'model' => 'required',
            'engine_type' => 'required',
            'year' => 'required|numeric',
            'avg_kmpg' => 'required|numeric',
            'license_plate' => 'required',
            'vehicle_owning_time' => 'required|date',
            'current_car_value' => 'required|numeric',
            'car_travel_distance' => 'required|numeric',
            'license_no' => 'required',
            'status' => 'required|in:0,1',
            'vehicle_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors()->first());
        }

        $user_id = auth('sanctum')->id();
        $vehicle = new Vehicle();
        $vehicle = $this->save_vehicle($vehicle, $request, $user_id);
        return $this->sendResponse('Vehicle Added successfully.',$vehicle);
    }
}
