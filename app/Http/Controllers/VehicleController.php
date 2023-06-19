<?php

namespace App\Http\Controllers;

use App\DirverInfo;
use App\Vehicle;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('vehicle.index');
    }

    public function get_data(Request $request)
    {
        $data = Vehicle::latest()->get();
        return DataTables::of($data)
        ->addColumn('vehicle_image', function ($row) {
            // dd($row);
                return '<img class="picheight" src="' . $row->vehicle_image . '">';
            })

            ->addColumn('action', function ($row) {
                $edit_btn_url = route('vehicles.edit', $row->id);
                return $this->get_buttons($edit_btn_url, $row->id);
            })
            ->addColumn('vehicle_status', function ($row)
            {
                return '<p>"'.$row->status ==true? "Active":"Inactive" .'"</p>';
            })
            ->rawColumns(['vehicle_image','action','vehicle_status'])
            ->make(true);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vehicle.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user_id = 2;
        $vehicle = new Vehicle;
        $vehicle->make = $request->make;
        $vehicle->color = $request->color;
        $vehicle->model = $request->model;
        $vehicle->engine_type = $request->engine_type;
        $vehicle->year = $request->year;
        $vehicle->avg_kmpg = $request->avg_kmpg;
        $vehicle->license_plate = $request->license_plate;
        $vehicle->license_expiry_date = Carbon::parse($request->license_expiry_date);
        $vehicle->license_no = $request->license_no;
        $vehicle->status = $request->status;

        $file = $request->file('vehicle_image');
        $filename = 'vehicle_' . rand() . '.' . $file->getClientOriginalExtension();
        $vehicle->vehicle_image = $filename;
        $file->storeAs('public/vehicle/', $filename);

        $vehicle->user_id = $user_id;
        $vehicle->save();
        return redirect()->route('vehicles.index')->with('alert', ['type' => 'success', 'message' => 'Driver saved successfully']);

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
