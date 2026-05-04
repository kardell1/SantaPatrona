<?php

namespace App\Support;

use Illuminate\Http\JsonResponse;

class ApiResponse
{
    public static function success(
        $data = null,
        int $status = 200,
    ): JsonResponse {
        $response = [
            "success" => true,
            "data" => $data,
        ];
        return response()->json($response, $status);
    }

    public static function error(
        string $code,
        int $status = 400,
        $details = null,
    ): JsonResponse {
        return response()->json(
            [
                "success" => false,
                // "data" => null,
                "error" => [
                    "code" => $code,
                    "details" => $details,
                ],
            ],
            $status,
        );
    }
}
