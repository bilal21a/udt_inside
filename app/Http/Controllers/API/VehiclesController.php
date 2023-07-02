<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Traits\VehicleTrait;
use App\Vehicle;
use App\VehicleDriver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VehiclesController extends Controller
{
    use VehicleTrait;
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
    public function vehicle_count()
    {
        $active = Vehicle::where('user_id', auth('sanctum')->id())->where('status', 1)->count();
        $inactive = Vehicle::where('user_id', auth('sanctum')->id())->where('status', '!=', 1)->count();
        return $this->sendResponse('Vehicle Count', ['active' => $active, 'inactive' => $inactive]);
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
            'make' => 'required',
            'color' => 'required',
            'model' => 'required',
            'driver_id' => 'required',
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
        $driver_id=$request->driver_id;
        $this->assignDriver($driver_id,$vehicle->id);
        return $this->sendResponse('Vehicle Added successfully.', $vehicle);
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
            $vehicle = Vehicle::with('driver')->find($id);
            if ($vehicle->user_id == auth('sanctum')->id()) {
                return $this->sendResponse('Vehicle Info', $vehicle);
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
                'make' => 'required',
                'color' => 'required',
                'model' => 'required',
                'engine_type' => 'required',
                'year' => 'required',
                'avg_kmpg' => 'required',
                'license_plate' => 'required',
                'license_no' => 'required',
                'vehicle_owning_time' => 'required',
                'current_car_value' => 'required',
                'car_travel_distance' => 'required|integer',
                'status' => 'required',
                'driver_id' => 'required',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors()->first());
            }
            $vehicle = Vehicle::find($id);
            if ($vehicle->user_id == auth('sanctum')->id()) {
                $vehicle = $this->save_vehicle($vehicle, $request, null, 'edit');
                $driver_id=$request->driver_id;
                $this->assignDriver($driver_id,$vehicle->id);
            } else {
                throw new \Exception("");
            }
            return $this->sendResponse('Vehicle Updated successfully.', $vehicle);
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
            $vehicle = Vehicle::find($id);
            if ($vehicle->user_id == auth('sanctum')->id()) {
                $this->delete_image($vehicle->vehicle_image);
                $vehicle->delete();
                return $this->sendResponse('Vehicle Deleted successfully.', null);
            } else {
                throw new \Exception("");
            }
        } catch (\Throwable $th) {
            return $this->sendError('Unknown Error Occured');
        }
    }
    public function assignDriver($driver_id,$vehicle_id)
    {
        $vehicle_driver=new VehicleDriver();
        $vehicle_driver->user_id=$driver_id;
        $vehicle_driver->vehicle_id=$vehicle_id;
        $vehicle_driver->customer_id=auth('sanctum')->id();
        $vehicle_driver->save();
    }
}
