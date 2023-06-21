<?php

namespace App\Http\Controllers;

use App\User;
use App\VehicleDriver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class AssignedDriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function get_assigned_drivers($id)
    {
        $data = VehicleDriver::with('vehicle', 'driver')->where('customer_id', $id)->get();
        return DataTables::of($data)
            ->addColumn('action', function ($row) {
                return $this->get_buttons_modals($row->id);
            })
            ->addColumn('driver', function ($row) {
                return $row->driver->full_name;
            })
            ->addColumn('vehicle', function ($row) {
                return $row->vehicle->make . '(' . $row->vehicle->license_no . ')';
            })
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $id = $request->customer_id;
        $user = User::find($id);
        $drivers = $user->drivers;
        $vehicles = $user->customers_vehicles;
        return view('customers.modals.add_customer_driver', compact('user', 'drivers', 'vehicles', 'id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = Validator::make(
            $request->all(),
            [
                'driver' => 'required',
                'vehicle' => 'required',
                'customer_id' => 'required',
            ],
        );
        if ($validate->fails()) {
            return response()->json($validate->errors()->first(), 500);
        }
        $driver_vehicle = new VehicleDriver();
        $driver_vehicle->vehicle_id = $request->vehicle;
        $driver_vehicle->user_id = $request->driver;
        $driver_vehicle->customer_id = $request->customer_id;
        $driver_vehicle->save();
        return 'Success';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vehicledriver = VehicleDriver::find($id);
        $user = User::find($vehicledriver->customer_id);
        $drivers = $user->drivers;
        $vehicles = $user->customers_vehicles;
        return view('customers.modals.edit_customer_driver', compact('user', 'drivers', 'vehicles', 'id', 'vehicledriver'));
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
        $validate = Validator::make(
            $request->all(),
            [
                'driver' => 'required',
                'vehicle' => 'required',
                'customer_id' => 'required',
                'id' => 'required',
            ],
        );
        if ($validate->fails()) {
            return response()->json($validate->errors()->first(), 500);
        }
        $driver_vehicle = VehicleDriver::find($request->id);
        $driver_vehicle->vehicle_id = $request->vehicle;
        $driver_vehicle->user_id = $request->driver;
        $driver_vehicle->save();
        return 'Success';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $driver_vehicle = VehicleDriver::find($id);
        $driver_vehicle->delete();
        return 'Delete successfully';
    }
}
