<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait userTrait
{
    public function saveUserData(array $data)
    {
        $user = $this->create($data);

        if (isset($data['profile_image'])) {
            $profileImage = $data['profile_image'];
            $user->profile_image = $profileImage->store('profile_images', 'public');
            $user->save();
        }

        return $user;
    }

    public function save_user($user, $request, $role, $type = null)
    {
        $user->first_name = $request->first_name;
        $user->middle_name = $request->middle_name;
        $user->last_name = $request->last_name;
        $user->role = $role;
        $user->phone = $request->phone;
        $user->email = $request->email;
        if ($request->password != null) { //only update in if provided
            $user->password = bcrypt($request->password);
        }
        $user->cnic = $request->cnic;
        if ($request->hasFile('profile_image')) {
            if ($type != null) {
                $this->delete_image($user->profile_image);
            }
            $file = $request->file('profile_image');
            $filename = 'user_' . rand() . '.' . $file->getClientOriginalExtension();
            $user->profile_image = $filename;
            $file->storeAs('public/user/', $filename);
        }
        //for driver case(assign parent id) 
        if ($role == 'driver' && $type == null) {
            $user->parent_id = $request->customer;
        }
        $user->address = $request->address;
        $user->gender = $request->gender;
        $user->description = $request->description;
        $user->save();

        return $user;
    }

    public function delete_image($path)
    {
        if (Storage::exists('public/user/' . $path)) {
            Storage::delete('public/user/' . $path);
        }
    }
}
