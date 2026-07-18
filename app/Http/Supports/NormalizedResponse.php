<?php

namespace App\Http\Supports;

use Illuminate\Pagination\LengthAwarePaginator;

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
    public static function successPaginated(
        LengthAwarePaginator $data,
        string $message = 'Operación realizada correctamente',
        int $status = 200
    ) {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $data->items(),
            'pagination' => [
                'current_page' => $data->currentPage(),
                'last_page' => $data->lastPage(),
                'per_page' => $data->perPage(),
                'total' => $data->total(),
                'from' => $data->firstItem(),
                'to' => $data->lastItem(),
                'has_more_pages' => $data->hasMorePages(),
            ],
            'errors' => null,
        ], $status);
    }
}
