<?php

namespace Modules\Products\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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

    public function authorize(): bool
    {
        return true;
    }
}
