<?php

namespace App\Http\Controllers;

use App\Http\Resources\VaccineCenterCollection;
use App\Models\VaccineCenter;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class VaccineCenterController extends Controller
{
    use ApiResponse;
    public function index(){
        $vaccine_centers = VaccineCenter::select(['id', 'name'])->get();
        return $this->success(VaccineCenterCollection::collection($vaccine_centers));
    }
}
