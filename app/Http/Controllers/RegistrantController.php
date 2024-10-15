<?php

namespace App\Http\Controllers;

use App\Http\Resources\RegistrantCollection;
use App\Models\Registrant;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class RegistrantController extends Controller
{
    use ApiResponse;

    public function index(Request $request){
        $limit = $request->limit ?? 10;
        $page = $request->page ?? 1;
        $offset = ($page - 1) * $limit;
        $registrants = Registrant::select(['id', 'name', 'phone'])->with(['appointment', 'appointment.vaccine_center'])->skip($offset)->take($limit)->get();
        $responseData = [
            "list" => RegistrantCollection::collection($registrants),
            "limit" => $limit,
            "page" => $page,
            "total" => Registrant::count()
        ];
        return $this->success($responseData);
    }
}
