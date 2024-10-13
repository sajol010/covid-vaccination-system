<?php

namespace Database\Seeders;

use App\Models\VaccineCenter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VaccineCenterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $centers = [
            ['name' => 'Center 1', 'capacity' => 10],
            ['name' => 'Center 2', 'capacity' => 20],
            ['name' => 'Center 3', 'capacity' => 15],
            ['name' => 'Center 4', 'capacity' => 25],
            ['name' => 'Center 5', 'capacity' => 5],
        ];

        foreach ($centers as $center)
            VaccineCenter::create($center);
    }
}
