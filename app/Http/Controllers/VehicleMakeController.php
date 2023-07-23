<?php

namespace App\Http\Controllers;

use App\Vehicle;
use App\VehicleMake;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class VehicleMakeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('vehicle_make.index');
    }

    public function get_data(Request $request)
    {
        $data = VehicleMake::latest()->get();
        return DataTables::of($data)
            ->addColumn('vehicle_image', function ($row) {
                return '<img class="img-fluid" src="' . $row->image_url . '">';
            })
            ->addColumn('action', function ($row)  {
                $edit_btn_url = route('vehicle_make.edit', $row->id);
                return $this->get_buttons($edit_btn_url, $row->id);
            })
            ->rawColumns(['vehicle_image', 'action'])
            ->make(true);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('vehicle_make.add');
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
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg,webp',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->with('alert', ['type' => 'danger', 'message' => $validator->errors()->first()]);
        }
        $vehicle_make = new VehicleMake;
        $vehicle_make = $this->save_vehicle_make($vehicle_make, $request);
        return redirect()->route('vehicle_make.index')->with('alert', ['type' => 'success', 'message' => 'Vehicle Make saved successfully']);
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
    public function edit(Request $request, $id)
    {
        $vehicle_make = VehicleMake::find($id);
        return view('vehicle_make.edit', compact('vehicle_make'));
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
        $validator = Validator::make($request->all(), [
            'make' => 'required',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif,svg,webp',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->with('alert', ['type' => 'danger', 'message' => $validator->errors()->first()]);
        }
        $vehicle_make = VehicleMake::find($id);
        $vehicle_make = $this->save_vehicle_make($vehicle_make, $request,'edit');
        return redirect()->route('vehicle_make.index')->with('alert', ['type' => 'success', 'message' => '"' . $vehicle_make->make . '" Updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vehicle_make = VehicleMake::find($id);
        $this->delete_vehicle_modal($vehicle_make);
        $this->delete_image($vehicle_make->image);
        $vehicle_make->delete();
        return "deleted successfully";
    }

    public function save_vehicle_make($vehicle_make, $request, $type = null)
    {
        $vehicle_make->make = $request->make;
        if ($request->hasFile('image')) {
            if ($type != null) {
                $this->delete_image($vehicle_make->image);
            }
            $file = $request->file('image');
            $filename = 'vehicle_make_' . rand() . '.' . $file->getClientOriginalExtension();
            $vehicle_make->image = $filename;
            $file->storeAs('public/vehicle_make/', $filename);
        }
        $vehicle_make->save();
        return $vehicle_make;
    }
    public function delete_image($path)
    {
        if (Storage::exists('public/vehicle_make/' . $path)) {
            Storage::delete('public/vehicle_make/' . $path);
        }
    }
    public function delete_image_modal($path)
    {
        if (Storage::exists('public/vehicle_modal/' . $path)) {
            Storage::delete('public/vehicle_modal/' . $path);
        }
    }
    public function delete_vehicle_modal($vehicle_make)
    {
        $vehicle_modals=$vehicle_make->vehicle_modals;
        foreach ($vehicle_modals as $modal){
            $this->delete_image($modal->image);
            $modal->delete();
        }
    }
}
