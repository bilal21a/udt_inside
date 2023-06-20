<?php

namespace App\Traits;

use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

trait VehicleTrait
{
    public function save_vehicle($vehicle, $request, $user_id = null, $type = null)
    {
        $vehicle->make = $request->make;
        $vehicle->color = $request->color;
        $vehicle->model = $request->model;
        $vehicle->engine_type = $request->engine_type;
        $vehicle->year = $request->year;
        $vehicle->avg_kmpg = $request->avg_kmpg;
        $vehicle->license_plate = $request->license_plate;
        $vehicle->license_expiry_date = Carbon::parse($request->license_expiry_date);
        $vehicle->license_no = $request->license_no;
        $vehicle->status = $request->status;
        if ($request->hasFile('vehicle_image')) {
            if ($type != null) {
                $this->delete_image($vehicle->vehicle_image);
            }if ($user_id != null) {
                $vehicle->user_id = $user_id;
            }
            $file = $request->file('vehicle_image');
            $filename = 'vehicle_' . rand() . '.' . $file->getClientOriginalExtension();
            $vehicle->vehicle_image = $filename;
            $file->storeAs('public/vehicle/', $filename);
        }
        $vehicle->save();

        return $vehicle;
    }

    public function delete_image($path)
    {
        if (Storage::exists('public/vehicle/' . $path)) {
            Storage::delete('public/vehicle/' . $path);
        }
    }
}
