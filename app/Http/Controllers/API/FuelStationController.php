<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\FuelStation;
use App\Traits\FuelStationTrait;

class FuelStationController extends Controller
{
    use FuelStationTrait;
    public function add_fuel_station(Request $request)
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
        return $this->sendResponse('Fuel Station Added successfully.',$fuelpump);
    }
}
