<?php

namespace App\Http\Controllers\API;

use App\FuelStation;
use App\Http\Controllers\Controller;
use App\Traits\FuelStationTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FuelStationsController extends Controller
{
    use FuelStationTrait;
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
        $query = FuelStation::where('user_id', $user_id);

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'LIKE', '%' . $search . '%')
                    ->orWhere('address', 'LIKE', '%' . $search . '%')
                    ->orWhere('lat', 'LIKE', '%' . $search . '%')
                    ->orWhere('lng', 'LIKE', '%' . $search . '%')
                    ->orWhere('capacity', 'LIKE', '%' . $search . '%')
                    ->orWhere('rate_per_liter', 'LIKE', '%' . $search . '%')
                    ->orWhere('franchiser_name', 'LIKE', '%' . $search . '%')
                    ->orWhere('email', 'LIKE', '%' . $search . '%')
                    ->orWhere('phone', 'LIKE', '%' . $search . '%')
                    ->orWhere('residential_address', 'LIKE', '%' . $search . '%')
                    ->orWhere('notes', 'LIKE', '%' . $search . '%');
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
    public function fuel_station_places($type = null)
    {
        $fuel_station = FuelStation::when($type != null, function ($query)  {
                return $query->where('user_id',auth('sanctum')->id());
            })->select('id','user_id', 'name', 'address', 'lat', 'lng', 'fuel_station_image')->where('status', 1)->get();
        return $this->sendResponse('Fuel Stations', $fuel_station);
    }
    public function fuel_capacity()
    {
        $fuel_station = FuelStation::where('user_id',auth('sanctum')->id())->select('id','user_id', 'capacity','status')->where('status', 1)->sum('capacity');
        return $this->sendResponse('Fuel Stations Capacity', $fuel_station);
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
            'name' => 'required',
            'address' => 'required',
            'lat' => 'required',
            'lng' => 'required',
            'capacity' => 'required',
            'rate_per_liter' => 'required',
            'franchiser_name' => 'required',
            'email' => 'required|email|unique:fuel_stations,email',
            'phone' => 'required',
            'residential_address' => 'required',
            'fuel_type' => 'required',
            'notes' => 'required',
            'approval_certificate_image' => 'required|mimes:jpeg,png,jpg,gif,svg,webp',
            'fuel_station_image' => 'required|mimes:jpeg,png,jpg,gif,svg,webp',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors()->first());
        }

        $user_id = auth('sanctum')->id();
        $fuelpump = new FuelStation();
        $fuelpump = $this->save_fuel_station($fuelpump, $request, $user_id);
        return $this->sendResponse('Fuel Station Added successfully.', $fuelpump);
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
            $fuelpump = FuelStation::find($id);
            if ($fuelpump->user_id == auth('sanctum')->id()) {
                return $this->sendResponse('Fuel Station Data.', $fuelpump);
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
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'address' => 'required',
            'lat' => 'required',
            'lng' => 'required',
            'capacity' => 'required',
            'rate_per_liter' => 'required',
            'franchiser_name' => 'required',
            'email' => 'required|email|unique:fuel_stations,email,' . $id,
            'phone' => 'required',
            'residential_address' => 'required',
            'fuel_type' => 'required',
            'notes' => 'required',
            'approval_certificate_image' => 'required|mimes:jpeg,png,jpg,gif,svg,webp',
            'fuel_station_image' => 'required|mimes:jpeg,png,jpg,gif,svg,webp',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors()->first());
        }

        $user_id = auth('sanctum')->id();
        $fuelpump = FuelStation::find($id);
        $fuelpump = $this->save_fuel_station($fuelpump, $request, $user_id, 'edit');
        return $this->sendResponse('Fuel Station Updated successfully.', $fuelpump);
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
            $fuelpump = FuelStation::find($id);
            if ($fuelpump->user_id == auth('sanctum')->id()) {
                $this->delete_image($fuelpump->approval_certificate_image, 'certificate');
                $this->delete_image($fuelpump->fuel_station_image, 'image');
                $fuelpump->delete();
                return $this->sendResponse('Fuel Station Deleted successfully.', null);
            } else {
                throw new \Exception("");
            }
        } catch (\Throwable $th) {
            return $this->sendError('Unknown Error Occured');
        }
    }
}
