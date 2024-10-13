<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Services\Users\UserService;
use App\Services\Vaccine\VaccineService;
use App\Traits\ApiResponse;
use Illuminate\Support\Facades\DB;

class VaccineController extends Controller
{

    private $vaccineService, $userService;
    public function __construct(VaccineService $vaccineService, UserService $userService)
    {
        $this->vaccineService = $vaccineService;
        $this->userService = $userService;
    }

    use ApiResponse;

    public function register(RegisterRequest $request)
    {
        DB::beginTransaction();
        try {
            $user = $this->userService->create($request->all());
            $this->vaccineService->registerUser($user['id'], $request['vaccine_center_id']);
            DB::commit();
            return $this->success("You have successfully registered to the vaccine center");
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
