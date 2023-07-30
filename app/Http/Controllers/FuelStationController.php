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
    public function index(Request $request)
    {
        $service_provider = $request->service_provider;
        return view('fuel_station.index', compact('service_provider'));
    }
    public function get_data(Request $request)
    {
        $service_provider = $request->service_provider;
        $data = FuelStation::when($service_provider != null, function ($query) use ($service_provider) {
            return $query->with('serviceProvider')->where('user_id', $service_provider);
        })->get();
        return DataTables::of($data)
            ->addColumn('image', function ($row) {
                return '<img class="img-fluid" src="' . $row->fuel_station_image_url . '">';
            })
            ->addColumn('map', function ($row) {
                // dd($row->approval_certificate_image_url);
                return '<p data-bs-toggle="modal" data-bs-target="#mapModal" onclick="showMap(' . $row->id . ')">Map</p>';
            })
            ->addColumn('fuel_type', function ($row) {
                $check = '<i class="bi-check-circle-fill text-success"></i></i>';
                $cross = '<i class="bi-x-circle-fill text-danger"></i></i>';
                return '<div class="d-flex flex-driection-column"style="padding-left: 71px;flex-direction: column;
                width: fit-content;"><span class="badge rounded-pill bg-outline-primary tex mb-1">Petrol ' . ($row->is_petrol ? $check : $cross) . '</span>
               <span class="badge rounded-pill bg-outline-primary mb-1"> Diesel ' . ($row->is_diesel ? $check : $cross) . '</span>
               <span class="badge rounded-pill bg-outline-primary mb-1"> Hi-Octane ' . ($row->is_hi_oct ? $check : $cross) . '</span>
               </div>';
            })
            ->addColumn('status', function ($row) {
                $status = $row->status == 1 ? "Active" : "Inactive";
                return $status;
            })
            ->addColumn('service_provider', function ($row) use($service_provider) {
                return $service_provider == null ?  '<span class="text-info fw-semibold">' . $row->serviceProvider->full_name . '</span>' : '';
            })
            ->addColumn('action', function ($row) use ($service_provider) {
                $edit_btn_url = route('fuel_station.edit', [$row->id, 'service_provider' => $service_provider]);
                return $this->get_buttons($edit_btn_url, $row->id);
            })
            ->rawColumns(['image', 'map', 'fuel_type', 'action','service_provider'])
            ->make(true);
    }
    public function fuel_station_map($id)
    {
        $fuelpump = FuelStation::find($id);
        return view('fuel_station.modals.map');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $service_provider = $request->service_provider;
        if ($service_provider) {
            return view('fuel_station.add', compact('service_provider'));
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
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'capacity' => 'required|max:255|numeric',
            'phone' => 'required',
            'email' => 'required|email|unique:fuel_stations,email',
            'franchiser_name' => 'required|max:255',
            'rate_per_liter' => 'required',
            'address' => 'required',
            'lat' => 'required',
            'lng' => 'required',
            'residential_address' => 'required',
            'notes' => 'required',
            'fuel_type'  => 'required',
            'approval_certificate_image' => 'required|mimes:jpeg,png,jpg,gif,svg,webp',
            'fuel_station_image' => 'required|mimes:jpeg,png,jpg,gif,svg,webp',
            'service_provider' => 'required',
        ]);
        $user_id = $request->service_provider;
        if ($validator->fails()) {
            return redirect()->route('fuel_station.create', ['service_provider' => $user_id])->withInput()->with('alert', ['type' => 'danger', 'message' => $validator->errors()->first()]);
        }

        $fuelpump = new FuelStation();
        $fuelpump = $this->save_fuel_station($fuelpump, $request, $user_id);
        return redirect()->route('fuel_station.index', ['service_provider' => $user_id])->with('alert', ['type' => 'success', 'message' => 'Customer "' . $fuelpump->name . '" Updated successfully']);
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
        $service_provider = $request->service_provider;
        if ($service_provider) {
            $fuelpump = FuelStation::find($id);
            return view('fuel_station.edit', compact('id', 'fuelpump', 'service_provider'));
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
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'capacity' => 'required|max:255|numeric',
            'phone' => 'required',
            'email' => 'required|email|unique:fuel_stations,email,' . $id,
            'franchiser_name' => 'required|max:255',
            'rate_per_liter' => 'required',
            'address' => 'required',
            'lat' => 'required',
            'lng' => 'required',
            'residential_address' => 'required',
            'notes' => 'required',
            'fuel_type'  => 'required',
            'approval_certificate_image' => 'nullable|mimes:jpeg,png,jpg,gif,svg,webp',
            'fuel_station_image' => 'nullable|mimes:jpeg,png,jpg,gif,svg,webp',
            'service_provider' => 'required',
        ]);
        $user_id = $request->service_provider;
        if ($validator->fails()) {
            return redirect()->route('fuel_station.edit', [$id, 'service_provider' => $user_id])->withInput()->with('alert', ['type' => 'danger', 'message' => $validator->errors()->first()]);
        }

        $fuelpump = FuelStation::find($id);
        $fuelpump = $this->save_fuel_station($fuelpump, $request, $fuelpump->user_id, 'edit');
        return redirect()->route('fuel_station.index', ['service_provider' => $user_id])->with('alert', ['type' => 'success', 'message' => 'Fuel Station "' . $fuelpump->name . '" Updated successfully']);
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
