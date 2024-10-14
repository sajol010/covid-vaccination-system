<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Services\Registrant\RegistrantService;
use App\Services\Vaccine\VaccineService;
use App\Traits\ApiResponse;
use Illuminate\Support\Facades\DB;

class VaccineController extends Controller
{

    private $vaccineService, $registrantService;
    public function __construct(VaccineService $vaccineService, RegistrantService $registrantService)
    {
        $this->vaccineService = $vaccineService;
        $this->registrantService = $registrantService;
    }

    use ApiResponse;

    public function register(RegisterRequest $request)
    {
        DB::beginTransaction();
        try {
            $registrant = $this->registrantService->create($request->all());
            $this->vaccineService->registerUser($registrant['id'], $request['vaccine_center_id']);
            DB::commit();
            return $this->success([], 201, 'Vaccine registered successfully.');
        }catch (\Exception $exception){
            DB::rollBack();
            return $this->error($exception->getMessage());
        }
    }

    public function checkStatus($nid)
    {
        $status = $this->vaccineService->getUserStatus($nid);
        return $this->success([
            'status' => $status
        ]);
    }
}
