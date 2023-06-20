<?php

namespace App\Http\Controllers;

use App\Traits\VehicleTrait;
use App\Vehicle;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class VehicleController extends Controller
{
    use VehicleTrait;
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
                return '<img class="picheight" src="' . $row->vehicle_image_url . '">';
            })

            ->addColumn('action', function ($row) {
                $edit_btn_url = route('vehicles.edit', $row->id);
                return $this->get_buttons($edit_btn_url, $row->id);
            })
            ->addColumn('vehicle_status', function ($row) {
                return '<p>"' . $row->status == true ? "Active" : "Inactive" . '"</p>';
            })
            ->rawColumns(['vehicle_image', 'action', 'vehicle_status'])
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
        $vehicle = $this->save_vehicle($vehicle, $request, $user_id);
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
        $vehicle = Vehicle::find($id);
        $status = $vehicle->status;
        return view('vehicle.edit', compact('vehicle', 'status'));
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
        $vehicle = Vehicle::find($id);
        $vehicle = $this->save_vehicle($vehicle, $request, null, 'edit');
        return redirect()->route('vehicles.index')->with('alert', ['type' => 'success', 'message' => 'V ehicle "' . $vehicle->make . '" Updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vehicle = Vehicle::find($id);
        $this->delete_image($vehicle->vehicle_image);
        $vehicle->delete();
        return "deleted successfully";
    }
}
