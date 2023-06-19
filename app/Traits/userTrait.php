<?php

namespace App\Traits;

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

}
