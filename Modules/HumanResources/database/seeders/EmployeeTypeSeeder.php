<?php

namespace Modules\HumanResources\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\HumanResources\Models\EmployeeType;

class EmployeeTypeSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['name' => "pasante",
            'description' => 'Empleado temporal que se queda al menos 3 meses '],
            ['name' => "interno",
            'description' => 'Empleado con sueldo fijo que figura en planilla de la empresa '],
        ];
        foreach($data as $type){
            EmployeeType::create($type);
        }
    }
}
