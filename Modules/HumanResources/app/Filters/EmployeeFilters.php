<?php

namespace Modules\HumanResources\Filters;

class EmployeeFilters
{   // visualizacion de los empleados
    // filtrar por area de trabajo
    // filtrar por rol
    // filtrar por numero de celular
    // filtrar por nombre
    // Datos a mostrar :
    // nombre, cargo , celular , imagen , salario , estado (activo)
    public static function filters(): array
    {
        return [
            'position' => [
                'relation' => 'position',
                'callback' =>   fn($query, $value) =>
                $query->whereHas('position', fn($query) => $query->where('id', $value)),
            ],

            'phone' => [
                'relation' => 'person.profile',
                'callback' =>   fn($query, $value) =>
                $query->whereHas('person', fn($query) => $query->where('phone', 'like', "%{$value}%")),
            ],

            'name' => [
                'relation' => 'person.profile',
                'callback' =>
                fn($query, $value) =>
                $query->whereHas('person', fn($query) => $query->where('name', 'like', "%{$value}%")),
            ],

            'rol' => [
                'relation' => 'user.role',
                'callback' =>  fn($query, $value) =>
                $query->whereHas('users.role', fn($query) => $query->where('id', $value))
            ]
        ];
    }

    public static function apply($query, array $filters)
    {
        // filtramos las reglas
        $rules = static::filters();
        // aplicamos las relaciones
        //$relations = [];

        foreach ($filters as $key => $value) {

            if (! isset($rules[$key])) {
                continue;
            }

            //$relations[] = $rules[$key]['relation'];

            $rules[$key]['callback'](
                $query,
                $value
            );
        }
        // aplicamos las relaciones
        //$query->with(array_unique($relations));
        $query->with('user.role','person.profile' , 'position' , 'employeeType' , 'user.branches' );
        return $query;
    }
}
