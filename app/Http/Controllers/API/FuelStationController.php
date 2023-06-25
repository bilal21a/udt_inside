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
        return $this->sendResponse('Fuel Station Added successfully.', $fuelpump);
    }

    // datatable 
    public function get_fuel_stations_data(Request $request)
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
}
