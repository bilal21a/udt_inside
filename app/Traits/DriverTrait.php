<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait DriverTrait
{
    public function save_data($user, $request, $type = null)
    {
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->role = "customer";
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->cnic = $request->cnic;
        if ($request->hasFile('profile_image')) {
            if ($type != null) {
                $this->delete_image($user->profile_image);
            }
            $file = $request->file('profile_image');
            $filename = 'customer_' . rand() . '.' . $file->getClientOriginalExtension();
            $user->profile_image = $filename;
            $file->storeAs('public/customer/', $filename);
        }
        $user->address = $request->address;
        $user->gender = $request->gender;
        $user->save();

        return $user;
    }

    public function delete_image($path)
    {
        if (Storage::exists('public/customer/' . $path)) {
            Storage::delete('public/customer/' . $path);
        }
    }
}
