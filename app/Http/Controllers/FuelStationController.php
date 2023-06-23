<?php

namespace App\Http\Controllers;

use App\FuelPumps;
use App\FuelStation;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class FuelStationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd('he;');
        return view('fuel_station.index');
    }
    public function get_data()
    {
        $data = FuelStation::get();
        return DataTables::of($data)
            ->addColumn('image', function ($row) {
                // dd($row->approval_certificate_image_url);
                return '<img class="picheight" src="' . $row->fuel_station_image_url . '">';
            })
            ->addColumn('map', function ($row) {
                // dd($row->approval_certificate_image_url);
                return '<p>Map</p>';
            })
            ->addColumn('fuel_type', function ($row) {
                // dd($row->approval_certificate_image_url);
                return '<div class="d-flex flex-driection-column"style="padding-left: 71px;flex-direction: column;
                width: fit-content;"><span class="badge rounded-pill bg-separator mb-1">Petrol<i class="fa fa-check-circle"></i></i></span>
               <span class="badge rounded-pill bg-separator mb-1"> Diesel</span>
               <span class="badge rounded-pill bg-separator mb-1"> Hi-Octane</span>
               </div>';
            })
            ->addColumn('status', function ($row) {
                $status = $row->status == 1 ? "Active" : "Inactive";
                return $status;
            })
            ->addColumn('action', function ($row) {
                $edit_btn_url = route('fuel_station.edit', $row->id);
                $view_btn_url = route('customers.show', $row->id);
                return $this->viewButton($view_btn_url) . $this->get_buttons($edit_btn_url, $row->id);
            })
            ->rawColumns(['image', 'map', 'fuel_type', 'action'])
            ->make(true);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fuel_station.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'capacity' => 'required|max:255',
            'phone' => 'required',
            'email' => 'required|unique:users,email',
            'franchiser_name' => 'required|max:255',
            'rate_per_liter' => 'required',
            'address' => 'required',
            'lat' => 'required',
            'lng' => 'required',
            'residential_address' => 'required',
            'notes' => 'required',
            'approval_certificate_image' => 'required|mimes:jpeg,png,jpg,gif,svg,webp',
            'fuel_station_image' => 'required|mimes:jpeg,png,jpg,gif,svg,webp',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->with('alert', ['type' => 'danger', 'message' => $validator->errors()->first()]);
        }

        $fuelpump = new FuelStation();
        $fuelpump->name = $request->name;
        $fuelpump->user_id = '2';
        $fuelpump->capacity = $request->capacity;
        $fuelpump->phone = $request->phone;
        $fuelpump->email = $request->email;
        $fuelpump->franchiser_name = $request->franchiser_name;
        $fuelpump->rate_per_liter = $request->rate_per_liter;
        $fuelpump->address = $request->address;
        $fuelpump->lat = $request->lat;
        $fuelpump->lng = $request->lng;
        $fuelpump->residential_address = $request->residential_address;
        $fuelpump->status = '1';
        $fuelpump->notes = $request->notes;
        if ($request->hasFile('approval_certificate_image')) {
            $file = $request->file('approval_certificate_image');
            $filename = 'approval_certificate_image_' . rand() . '.' . $file->getClientOriginalExtension();
            $fuelpump->approval_certificate_image = $filename;
            $file->storeAs('public/fuel_station/certificate', $filename);
        }
        if ($request->hasFile('fuel_station_image')) {
            $file = $request->file('fuel_station_image');
            $filename = 'fuel_station_image_' . rand() . '.' . $file->getClientOriginalExtension();
            $fuelpump->fuel_station_image = $filename;
            $file->storeAs('public/fuel_station/image', $filename);
        }
        $fuelpump->save();
        return redirect()->route('fuel_station.index')->with('alert', ['type' => 'success', 'message' => 'Customer "' . $fuelpump->name . '" Updated successfully']);
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
        $fuelpump = FuelStation::find($id);
        return view('fuel_station.edit', compact('id', 'fuelpump'));
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
            'name' => 'required|max:255',
            'capacity' => 'required|max:255',
            'phone' => 'required',
            'email' => 'required|unique:users,email',
            'franchiser_name' => 'required|max:255',
            'rate_per_liter' => 'required',
            'address' => 'required',
            'lat' => 'required',
            'lng' => 'required',
            'residential_address' => 'required',
            'notes' => 'required',
            'approval_certificate_image' => 'nullable|mimes:jpeg,png,jpg,gif,svg,webp',
            'fuel_station_image' => 'nullable|mimes:jpeg,png,jpg,gif,svg,webp',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->with('alert', ['type' => 'danger', 'message' => $validator->errors()->first()]);
        }

        $fuelpump = FuelStation::find($id);
        $fuelpump->name = $request->name;
        $fuelpump->capacity = $request->capacity;
        $fuelpump->phone = $request->phone;
        $fuelpump->email = $request->email;
        $fuelpump->franchiser_name = $request->franchiser_name;
        $fuelpump->rate_per_liter = $request->rate_per_liter;
        $fuelpump->address = $request->address;
        $fuelpump->lat = $request->lat;
        $fuelpump->lng = $request->lng;
        $fuelpump->residential_address = $request->residential_address;
        $fuelpump->notes = $request->notes;
        if ($request->hasFile('approval_certificate_image')) {
            if (Storage::exists('public/fuel_station/image' . $fuelpump->approval_certificate_image)) {
                Storage::delete('public/fuel_station/image' . $$fuelpump->approval_certificate_image);
            }
            $file = $request->file('approval_certificate_image');
            $filename = 'approval_certificate_image_' . rand() . '.' . $file->getClientOriginalExtension();
            $fuelpump->approval_certificate_image = $filename;
            $file->storeAs('public/fuel_station/certificate', $filename);
        }
        if ($request->hasFile('fuel_station_image')) {
            if (Storage::exists('public/fuel_station/certificate' . $fuelpump->fuel_station_image)) {
                Storage::delete('public/fuel_station/certificate' . $$fuelpump->fuel_station_image);
            }
            $file = $request->file('fuel_station_image');
            $filename = 'fuel_station_image_' . rand() . '.' . $file->getClientOriginalExtension();
            $fuelpump->fuel_station_image = $filename;
            $file->storeAs('public/fuel_station/image', $filename);
        }
        $fuelpump->save();
        return redirect()->route('fuel_station.index')->with('alert', ['type' => 'success', 'message' => 'Driver "' . $fuelpump->name . '" Updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fuelpump = FuelStation::find($id);
        if (Storage::exists('public/fuel_station/certificate/' . $fuelpump->approval_certificate_image)) {
            Storage::delete('public/fuel_station/certificate/' . $fuelpump->approval_certificate_image);
        }
        if (Storage::exists('public/fuel_station/image/' . $fuelpump->fuel_station_image)) {
            Storage::delete('public/fuel_station/image/' . $fuelpump->fuel_station_image);
        }
        $fuelpump->delete();
    }
}
