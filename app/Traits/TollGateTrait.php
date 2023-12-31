<?php
namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait TollGateTrait
{
    public function save_toll_gate($tollGate, $request, $user_id, $type = null)
    {
        $tollGate->name = $request->name;
        $tollGate->address = $request->address;
        $tollGate->lat = $request->lat;
        $tollGate->lng = $request->lng;
        $tollGate->stv_fee = $request->stv_fee;
        $tollGate->ltv_fee = $request->ltv_fee;
        $tollGate->note = $request->note;
        $tollGate->user_id = $user_id;
        $tollGate->status = 1;
        $this->save_gate_image($request, $tollGate, 'image', 'toll_gate_images', $type);
        $tollGate->save();

        $message='new TollGate <span class="text-success fw-semibold">'.$tollGate->name.'</span> added';
        generate_activity('toll_gates', $message, $tollGate->id, $type = 'add');

        return $tollGate;
    }

    public function delete_image($path)
    {
        if (Storage::exists('public/' . $path)) {
            Storage::delete('public/' . $path);
        }
    }

    public function save_gate_image($request, $tollGate, $db_type, $folder_type, $type)
    {
        if ($request->hasFile($db_type)) {
            if ($type != null) {
                $this->delete_image($tollGate->$db_type);
            }
            $file = $request->file($db_type);
            $filename = 'toll_gate_' . rand() . '.' . $file->getClientOriginalExtension();
            $tollGate->$db_type = $filename;
            $file->storeAs('public/'.$folder_type.'/', $filename);
        }
    }
}
