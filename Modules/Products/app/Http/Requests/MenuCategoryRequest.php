<?php

namespace Modules\Products\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class MenuCategoryRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            "category" => "required|string|min:4"
        ];
    }

    public function messages(): array
    {
        return [
            "category.required" => "Este campo es obligatorio",
            "category.string" => "formato invalido",
            "categroy.min" => "La nueva categoria debe ser mayor a 4 caracteres"
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
