<?php

namespace App\Services\Registrant;

use App\Models\Registrant;

class RegistrantService
{
    /**
     * @throws \Exception
     */
    public function create(array $data): ?Registrant
    {

        if (empty($data['nid']))
            return throw new \Exception("NID can not be empty");

        if (empty($data['phone']))
            return throw new \Exception("Phone number can not be empty");

        $user = Registrant::create($data);
        if (!$user)
            throw new \Exception("User not created");

        return $user;
    }

    public function getByNID(string $nid): ?Registrant
    {
        return Registrant::where('nid', $nid)->first();
    }
}
