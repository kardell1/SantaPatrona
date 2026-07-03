<?php

namespace Modules\HumanResources\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeConfigurationStoreRequest extends FormRequest
{
    protected $stopOnFirstFailure = true;
    public function rules(): array
    {
        return [
            // Usuario
            'username' => 'required|string|min:4|max:50|unique:users,username',
            'password' => 'required|string|min:8|max:255',
            'is_locked' => 'required|boolean',

            // Sucursales
            'branches' => 'required|array|min:1',
            'branches.*' => 'required|integer|exists:branches,id',

            // Cargo y rol
            'position_id' => 'required|integer|exists:positions,id',
            'role_id' => 'required|integer|exists:roles,id',

            // Tipo de empleado
            'type_id' => "required|integer|exists:employee_types,id",

            // Persona
            'first_name' => 'required|string|min:2|max:50',
            'middle_name' => 'nullable|string|max:50',

            'paternal_lastname' => 'required|string|min:2|max:50',
            'maternal_lastname' => 'nullable|string|min:2|max:50',

            'email' => 'required|email|max:100|unique:people,email',
            'phone' => 'required|string|min:7|max:20',

            // Identificación
            'identification_type' => 'required|string|in:CI,PASSPORT,NIT',
            'identification_id' => 'required|string|max:30',

            // Datos laborales
            'age' => 'required|integer|min:18|max:100',
            'salary' => 'required|numeric|min:0',
            'start_date' => 'required|date',
        ];
    }

    public function messages(): array
    {
        return [
            // Usuario
            'username.required' => 'El nombre de usuario es obligatorio.',
            'username.string' => 'El nombre de usuario debe ser una cadena de texto.',
            'username.min' => 'El nombre de usuario debe tener al menos :min caracteres.',
            'username.max' => 'El nombre de usuario no puede superar los :max caracteres.',
            'username.unique' => 'El nombre de usuario ya se encuentra registrado.',

            'password.required' => 'La contraseña es obligatoria.',
            'password.string' => 'La contraseña debe ser una cadena de texto.',
            'password.min' => 'La contraseña debe tener al menos :min caracteres.',
            'password.max' => 'La contraseña no puede superar los :max caracteres.',

            'is_locked.required' => 'El estado del usuario es obligatorio.',
            'is_locked.boolean' => 'El estado del usuario debe ser verdadero o falso.',

            // Sucursales
            'branches.required' => 'Debe seleccionar al menos una sucursal.',
            'branches.array' => 'Las sucursales deben enviarse en formato de lista.',
            'branches.min' => 'Debe seleccionar al menos una sucursal.',

            'branches.*.required' => 'El identificador de la sucursal es obligatorio.',
            'branches.*.integer' => 'El identificador de la sucursal debe ser un número entero.',
            'branches.*.exists' => 'La sucursal seleccionada no existe.',

            // Cargo y Rol
            'position_id.required' => 'El cargo es obligatorio.',
            'position_id.integer' => 'El cargo debe ser un identificador válido.',
            'position_id.exists' => 'El cargo seleccionado no existe.',

            'role_id.required' => 'El rol es obligatorio.',
            'role_id.integer' => 'El rol debe ser un identificador válido.',
            'role_id.exists' => 'El rol seleccionado no existe.',

            // Persona
            'first_name.required' => 'El nombre es obligatorio.',
            'first_name.string' => 'El nombre debe ser una cadena de texto.',
            'first_name.min' => 'El nombre debe tener al menos :min caracteres.',
            'first_name.max' => 'El nombre no puede superar los :max caracteres.',

            'middle_name.string' => 'El segundo nombre debe ser una cadena de texto.',
            'middle_name.max' => 'El segundo nombre no puede superar los :max caracteres.',

            'paternal_lastname.required' => 'El apellido paterno es obligatorio.',
            'paternal_lastname.string' => 'El apellido paterno debe ser una cadena de texto.',
            'paternal_lastname.min' => 'El apellido paterno debe tener al menos :min caracteres.',
            'paternal_lastname.max' => 'El apellido paterno no puede superar los :max caracteres.',

            'maternal_lastname.string' => 'El apellido materno debe ser una cadena de texto.',
            'maternal_lastname.min' => 'El apellido materno debe tener al menos :min caracteres.',
            'maternal_lastname.max' => 'El apellido materno no puede superar los :max caracteres.',

            // Contacto
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'Debe proporcionar un correo electrónico válido.',
            'email.max' => 'El correo electrónico no puede superar los :max caracteres.',
            'email.unique' => 'El correo electrónico ya se encuentra registrado.',

            'phone.required' => 'El número de teléfono es obligatorio.',
            'phone.string' => 'El número de teléfono debe ser una cadena de texto.',
            'phone.min' => 'El número de teléfono debe tener al menos :min caracteres.',
            'phone.max' => 'El número de teléfono no puede superar los :max caracteres.',

            // Identificación
            'identification_type.required' => 'El tipo de identificación es obligatorio.',
            'identification_type.string' => 'El tipo de identificación debe ser una cadena de texto.',
            'identification_type.in' => 'El tipo de identificación seleccionado no es válido.',

            'identification_id.required' => 'El número de identificación es obligatorio.',
            'identification_id.string' => 'El número de identificación debe ser una cadena de texto.',
            'identification_id.max' => 'El número de identificación no puede superar los :max caracteres.',

            // Datos personales
            'age.required' => 'La edad es obligatoria.',
            'age.integer' => 'La edad debe ser un número entero.',
            'age.min' => 'La edad mínima permitida es :min años.',
            'age.max' => 'La edad máxima permitida es :max años.',

            // Datos laborales
            'salary.required' => 'El salario es obligatorio.',
            'salary.numeric' => 'El salario debe ser un valor numérico.',
            'salary.min' => 'El salario no puede ser negativo.',

            'start_date.required' => 'La fecha de inicio es obligatoria.',
            'start_date.date' => 'La fecha de inicio debe tener un formato válido.',
        ];
    }
    public function authorize(): bool
    {
        return true;
    }

    /* protected function failedValidation(Validator $validator) */
    /* { */
    /*     throw new HttpResponseException( */
    /*         response()->json([ */
    /*             'success' => false, */
    /*             'message' => 'Errores de validación', */
    /*             'errors' => $validator->errors(), */
    /*         ], 422) */
    /*     ); */
    /* } */
}
