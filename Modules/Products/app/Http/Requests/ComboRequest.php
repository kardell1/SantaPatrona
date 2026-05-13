<?php

namespace Modules\Products\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComboRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            "name" => "required|string|max:255|unique:tu_tabla,name",
            "description" => "required|string",
            "status" => "nullable|boolean",
        ];
    }

    public function messages(): array
    {
        return [
            "name.required" => "El nombre es obligatorio.",
            "name.string" => "El nombre debe ser texto.",
            "name.max" => "El nombre no debe superar los 255 caracteres.",
            "name.unique" => "El nombre ya existe.",

            "description.required" => "La descripcion es obligatoria.",
            "description.string" => "La descripcion debe ser texto.",

            "status.boolean" => "El estado debe ser verdadero o falso.",
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
