<?php

namespace Modules\HumanResources\Http\Formatters;

class EmployeeFormatter
{
    // para que pueda filtrar facilmente y mostrarlo visualmente , mandamos el id del elemento
    public static function cleanIndexEmployee (mixed $form)
    {
        $clean = $form->map(fn($employee)=>[
            'id' => $employee->id,
            'salary' => $employee->salary,
            'position' => $employee->position->name,
            'name' => $employee->person->first_name,
            'paternal_lastname' => $employee->person->profile->paternal_lastname,
            'type' => $employee->employeeType->name,
            'branches' => $employee->user->branches->map(fn($branch)=>[
                'name' => $branch->name
            ])
        ]);
        return $clean;
    }
}


