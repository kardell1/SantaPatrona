<?php

namespace Modules\Sales\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class SaleRequest extends FormRequest
{
    public function rules(): array
    {
        return [

            // venta principal
            "client_id" => "required|integer|exists:people,id",
            "total_amount" => "required|numeric|min:0",
            "type_payment" => "required|string|in:delivery,internal,event",

            // items generales
            "items" => "required|array|min:1",

            // tipo de item
            "items.*.is_combo" => "required|boolean",

            // combo
            "items.*.combo_id" => "nullable|integer|exists:combos,id",

            // Venta de productos
            "items.*.products" => "nullable|array",


        ];
    }


    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(

            response()->json([
                'success' => false,
                'message' => 'Errores de validacion',
                'errors' => $validator->errors()
            ], 422)

        );
    }

    public function authorize(): bool
    {
        return true;
    }
}
