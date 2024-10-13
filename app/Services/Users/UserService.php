<?php

namespace App\Services\Users;

use App\Models\User;

class UserService
{
    /**
     * @throws \Exception
     */
    public function create(array $data): ?User
    {

        if (empty($data['nid']))
            return throw new \Exception("NID can not be empty");

        if (empty($data['phone']))
            return throw new \Exception("Phone number can not be empty");


        $user = User::create($data);
        if (!$user)
            throw new \Exception("User not created");

        return $user;
    }

    public function getByNID(string $nid): ?User
    {
        return User::where('nid', $nid)->first();
    }
}
