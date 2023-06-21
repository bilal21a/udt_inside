<?php

namespace App\Http\Controllers;

use App\Traits\VehicleTrait;
use App\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class VehicleController extends Controller
{
    use VehicleTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $customer_id = $request->customer;
        if ($customer_id) {
            return view('vehicle.index', compact('customer_id'));
        } else {
            return redirect()->back();
        }
    }

    public function get_data(Request $request)
    {
        $customer_id = $request->customer;
        $data = Vehicle::where('user_id', $customer_id)->latest()->get();
        return DataTables::of($data)
            ->addColumn('vehicle_image', function ($row) {
                return '<img class="picheight" src="' . $row->vehicle_image_url . '">';
            })

            ->addColumn('action', function ($row) use ($customer_id) {
                $view_btn_url = route('vehicles.show', $row->id);
                $edit_btn_url = route('vehicles.edit', [$row->id, 'customer' => $customer_id]);
                return $this->viewButton($view_btn_url).$this->get_buttons($edit_btn_url, $row->id);
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
    public function create(Request $request)
    {
        $customer_id = $request->customer;
        if ($customer_id) {
            return view('vehicle.add',compact('customer_id'));
        } else {
            return redirect()->back();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customer_id = $request->customer;
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
            'vehicle_image' => 'required',
            'customer' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->route('vehicles.create', ['customer' => $customer_id])->withInput()->with('alert', ['type' => 'danger', 'message' => $validator->errors()->first()]);
        }
        $vehicle = new Vehicle;
        $vehicle = $this->save_vehicle($vehicle, $request, $customer_id);
        return redirect()->route('vehicles.index', ['customer' => $customer_id])->with('alert', ['type' => 'success', 'message' => 'Driver saved successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vehicle = Vehicle::find($id)->first();
        // dd($vehicle);
        return view('vehicle.view',compact('vehicle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $customer_id = $request->customer;
        if ($customer_id) {
            $vehicle = Vehicle::find($id);
            $status = $vehicle->status;
            return view('vehicle.edit', compact('vehicle', 'status','customer_id'));
        } else {
            return redirect()->back();
        }
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
        $customer_id = $request->customer;
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
            'customer' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->route('vehicles.edit', [$id,'customer' => $customer_id])->withInput()->with('alert', ['type' => 'danger', 'message' => $validator->errors()->first()]);
        }
        $vehicle = Vehicle::find($id);
        $vehicle = $this->save_vehicle($vehicle, $request, null, 'edit');
        return redirect()->route('vehicles.index', ['customer' => $customer_id])->with('alert', ['type' => 'success', 'message' => 'Vehicle "' . $vehicle->make . '" Updated successfully']);
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
