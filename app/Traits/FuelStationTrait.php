<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait FuelStationTrait
{
    public function save_fuel_station($fuelpump, $request, $user_id, $type = null)
    {
        $fuelpump->name = $request->name;
        $fuelpump->capacity = $request->capacity;
        $fuelpump->user_id = $user_id;
        $fuelpump->phone = $request->phone;
        $fuelpump->email = $request->email;
        $fuelpump->franchiser_name = $request->franchiser_name;
        $fuelpump->rate_per_liter = $request->rate_per_liter;
        $fuelpump->address = $request->address;
        $fuelpump->lat = $request->lat;
        $fuelpump->lng = $request->lng;
        $fuelpump->residential_address = $request->residential_address;
        $fuelpump->notes = $request->notes;
        $this->save_station_image($request, $fuelpump, 'approval_certificate_image', 'certificate', $type);
        $this->save_station_image($request, $fuelpump, 'fuel_station_image', 'image', $type);
        $fuelpump->save();

        return $fuelpump;
    }

    public function delete_image($path, $folder_type)
    {
        if (Storage::exists('public/fuel_station/' . $folder_type . '' . $path)) {
            Storage::delete('public/fuel_station/' . $folder_type . '' . $$path);
        }
    }
    public function save_station_image($request, $fuelpump, $db_type, $folder_type, $type)
    {
        if ($request->hasFile($db_type)) {
            if ($type != null) {
                $this->delete_image($fuelpump->$db_type, $folder_type);
            }
            $file = $request->file($db_type);
            $filename = '' . $db_type . '_' . rand() . '.' . $file->getClientOriginalExtension();
            $fuelpump->$db_type = $filename;
            $file->storeAs('public/fuel_station/' . $folder_type . '', $filename);
        }
    }
}
