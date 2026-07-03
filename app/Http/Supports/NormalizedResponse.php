<?php

namespace App\Http\Supports;

class NormalizedResponse
{
    public static function success(
        mixed $data = null, // no se sabe que dato se envia
        string $message = 'Operación realizada correctamente',
        int $status = 200
    ) {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $data,
            'errors' => null,
        ], $status);
    }

    public static function error(
        mixed $errors = null,
        string $message,
        int $status = 400
    ) {
        return response()->json([
            'success' => false,
            'message' => $message,
            'data' => null,
            'errors' => $errors,
        ], $status);
    }
}
