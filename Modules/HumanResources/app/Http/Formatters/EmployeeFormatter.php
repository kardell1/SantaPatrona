<?php

namespace Modules\HumanResources\Http\Formatters;

class EmployeeFormatter
{
    // para que pueda filtrar facilmente y mostrarlo visualmente , mandamos el id del elemento
    public static function cleanIndexEmployee(mixed $form)
    {
        $clean = $form->map(fn($employee) => [
            'id' => $employee->id,
            'salary' => $employee->salary,
            'position' => $employee->position->name,
            'name' => $employee->person->first_name,
            'paternal_lastname' => $employee->person->profile->paternal_lastname,
            'type' => $employee->employeeType->name,
            'branches' => $employee->user->branches->map(fn($branch) => $branch->name)
        ]);
        return $clean;
    }

    public static function cleanInfoEmployee(mixed $info)
    {
        $clean = [
            'name' => $info->person->first_name,
            'email' => $info->person->email,
            'cellphone' => $info->person->phone,
            'middle_name' => $info->profile->middle_name ?? '',
            'paternal_lastname' => $info->profile?->paternal_lastname ?? '',
            'maternal_lastname' => $info->profile?->maternal_lastname ?? '',
            'position' => $info->position->name,
            'type_employee' => $info->employeeType->name ?? 'Sin asignar',
            'branches' => $info->user->branches->map(fn($branch) => $branch->name) ?? [''],
            'salary' => $info->salary,
            'created_at' => $info->user->created_at,
            'monthly_sales' => '', // ventas mensuales
            'seniority_days' => '', // dias de antiguedad
            'total_sales' => '',
            'recent_activity' => '',
            'perfomance' => '',
            'payment_history' => []
        ];
        return $clean;
    }

    public static function cleanShowEmployee(mixed $employee)
    {
        $clean = [
            'id' => $employee->id,
            'username' => $employee->user->username,
            'password' => '',
            'is_locked' => false,
            'branches' => $employee->user->branches->map(fn($branch) => $branch->id),
            'position_id' => $employee->position_id,
            'role_id' => $employee->user->role?->id ?? '',
            'type_id' => $employee->employee_type_id,
            'first_name' => $employee->person->first_name,
            'middle_name' => $employee->person->profile->middle_name,
            'paternal_lastname' => $employee->person->profile->paternal_lastname,
            'maternal_lastname' => $employee->person->profile->maternal_lastname,
            'email' => $employee->person->email,
            'phone' => $employee->person->phone,
            'identification_type' => $employee->person->personDetails?->first()?->identifier_type,
            'identification_id' =>  $employee->person->personDetails?->first()?->identifier_id,
            'age' => $employee->person->profile->age,
            'salary' => $employee->salary,
            'start_date' => $employee->created_at?->format('Y-m-d'),
        ];
        return $clean;
    }
}
