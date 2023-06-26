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
            'year' => 'required',
            'avg_kmpg' => 'required',
            'license_plate' => 'required',
            'vehicle_owning_time' => 'required|date',
            'current_car_value' => 'required',
            'car_travel_distance' => 'required',
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
        return $this->sendResponse('Vehicle Added successfully.', $vehicle);
    }

    // datatable 
    public function get_vehicles_data(Request $request)
    {
        $perPage = $request->input('perPage', 10); // Number of records per page
        $search = $request->input('search');
        $user_id = auth('sanctum')->id();
        $query = Vehicle::where('user_id', $user_id);

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('make', 'LIKE', '%' . $search . '%')
                  ->orWhere('color', 'LIKE', '%' . $search . '%')
                  ->orWhere('model', 'LIKE', '%' . $search . '%')
                  ->orWhere('engine_type', 'LIKE', '%' . $search . '%')
                  ->orWhere('year', 'LIKE', '%' . $search . '%')
                  ->orWhere('avg_kmpg', 'LIKE', '%' . $search . '%')
                  ->orWhere('license_plate', 'LIKE', '%' . $search . '%')
                  ->orWhere('license_no', 'LIKE', '%' . $search . '%')
                  ->orWhere('vehicle_owning_time', 'LIKE', '%' . $search . '%')
                  ->orWhere('current_car_value', 'LIKE', '%' . $search . '%')
                  ->orWhere('car_travel_distance', 'LIKE', '%' . $search . '%');
                // Add more columns as needed
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
