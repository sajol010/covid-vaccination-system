<?php

namespace App\Services\Vaccine;

interface VaccineServiceInterface
{
    public function registerUser($userId, $vaccineCenterId);
    public function getUserStatus($userId);
}
