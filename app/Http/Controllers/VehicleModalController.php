<?php

namespace App\Http\Controllers;

use App\VehicleModal;
use App\VehicleMake;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class VehicleModalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('vehicle_modal.index');
    }

    public function get_data(Request $request)
    {
        $data = VehicleModal::latest()->get();
        return DataTables::of($data)
            ->addColumn('image', function ($row) {
                return '<img class="img-fluid" src="' . $row->image_url . '">';
            })
            ->addColumn('make', function ($row) {
                return $row->vehicle_make->make;
            })
            ->addColumn('action', function ($row) {
                $edit_btn_url = route('vehicle_modal.edit', $row->id);
                return $this->get_buttons($edit_btn_url, $row->id);
            })
            ->rawColumns(['image', 'action','make'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $vehicle_makes = VehicleMake::pluck('make', 'id')->all();
        return view('vehicle_modal.add', compact('vehicle_makes'));
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
            'modal' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg,webp',
            'vehicle_make_id' => 'required|exists:vehicle_makes,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->with('alert', ['type' => 'danger', 'message' => $validator->errors()->first()]);
        }

        $vehicleModal = new VehicleModal;
        $vehicleModal = $this->save_vehicle_modal($vehicleModal, $request);
        return redirect()->route('vehicle_modal.index')->with('alert', ['type' => 'success', 'message' => 'Vehicle Modal saved successfully']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $vehicle_modal = VehicleModal::find($id);
        $vehicle_makes = VehicleMake::pluck('make', 'id')->all();
        return view('vehicle_modal.edit', compact('vehicle_modal', 'vehicle_makes'));
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
            'modal' => 'required',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif,svg,webp',
            'vehicle_make_id' => 'required|exists:vehicle_makes,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->with('alert', ['type' => 'danger', 'message' => $validator->errors()->first()]);
        }

        $vehicleModal = VehicleModal::find($id);
        $vehicleModal = $this->save_vehicle_modal($vehicleModal, $request, 'edit');
        return redirect()->route('vehicle_modal.index')->with('alert', ['type' => 'success', 'message' => '"' . $vehicleModal->modal . '" Updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vehicleModal = VehicleModal::find($id);
        $this->delete_image($vehicleModal->image);
        $vehicleModal->delete();
        return "deleted successfully";
    }

    public function save_vehicle_modal($vehicleModal, $request, $type = null)
    {
        $vehicleModal->modal = $request->modal;
        $vehicleModal->vehicle_make_id = $request->vehicle_make_id;

        if ($request->hasFile('image')) {
            if ($type != null) {
                $this->delete_image($vehicleModal->image);
            }
            $file = $request->file('image');
            $filename = 'vehicle_modal_' . rand() . '.' . $file->getClientOriginalExtension();
            $vehicleModal->image = $filename;
            $file->storeAs('public/vehicle_modal/', $filename);
        }

        $vehicleModal->save();
        return $vehicleModal;
    }

    public function delete_image($path)
    {
        if (Storage::exists('public/vehicle_modal/' . $path)) {
            Storage::delete('public/vehicle_modal/' . $path);
        }
    }
}
