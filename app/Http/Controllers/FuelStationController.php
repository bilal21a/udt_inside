<?php

namespace App\Http\Controllers;

use App\FuelStation;
use App\Traits\FuelStationTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class FuelStationController extends Controller
{
    use FuelStationTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('fuel_station.index');
    }
    public function get_data()
    {
        $data = FuelStation::get();
        return DataTables::of($data)
            ->addColumn('image', function ($row) {
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

        $user_id = 2;
        $fuelpump = new FuelStation();
        $fuelpump = $this->save_fuel_station($fuelpump, $request, $user_id);
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
        $fuelpump = $this->save_fuel_station($fuelpump, $request, $fuelpump->user_id, 'edit');
        return redirect()->route('fuel_station.index')->with('alert', ['type' => 'success', 'message' => 'Fuel Station "' . $fuelpump->name . '" Updated successfully']);
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
        $this->delete_image($fuelpump->approval_certificate_image, 'certificate');
        $this->delete_image($fuelpump->fuel_station_image, 'image');
        $fuelpump->delete();
    }
}
