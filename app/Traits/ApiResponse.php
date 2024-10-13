<?php

namespace App\Traits;

use HttpResponseException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

trait ApiResponse
{
    /**
     * @param mixed $data
     * @param int $status
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function success(mixed $data, int $status = 200, string $message=''): \Illuminate\Http\JsonResponse
    {
        $response = [
            'data' => $data,
            'status' => $status,
            'success' => true
        ];
        if (!empty($message)) $response['message'] = $message;

        return response()->json($response, $status);
    }

    /**
     * @param string $message
     * @param int $status
     * @param array $errors
     * @return \Illuminate\Http\JsonResponse
     */
    public function error(string $message, int $status = 400, mixed $errors=[]): \Illuminate\Http\JsonResponse
    {
        $response = [
            'message' => $message,
            'status' => $status,
            'success' => false
        ];
        if (!empty($errors)) $response['errors'] = $errors;

        return response()->json($response, $status);
    }

    /**
     * @throws HttpResponseException
     */
    public static function rollback($e, $message ="Something went wrong! Process not completed"){
        DB::rollBack();
        self::throw($e, $message);
    }

    /**
     * @throws HttpResponseException
     */
    public static function throw($e, $message ="Something went wrong! Process not completed"){
        Log::info($e);
        throw new HttpResponseException(response()->json(["message"=> $message], 500));
    }
}

