<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\VehicleMake;
use App\VehicleModal;
use Illuminate\Http\Request;

class VehicleMakeModalController extends Controller
{
    public function get_vehicle_make()
    {
        try {
            $vehicle_make = VehicleMake::select('id','make')->get();
            return $this->sendResponse('List of Vehicle Makes', $vehicle_make);
        } catch (\Throwable $th) {
            return $this->sendError('Unknown error occured', $th);
        }
    }
    public function get_vehicle_modal($make_id)
    {
        try {
            $vehicle_modals = VehicleModal::select('id','modal','vehicle_make_id')->where('vehicle_make_id', $make_id)->get();
            return $this->sendResponse('List of Vehicle Modals', $vehicle_modals);
        } catch (\Throwable $th) {
            return $this->sendError('Unknown error occured', $th);
        }
    }
}
