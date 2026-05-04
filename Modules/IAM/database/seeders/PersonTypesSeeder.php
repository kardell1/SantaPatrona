<?php

namespace Modules\IAM\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\IAM\Models\PersonType;

class PersonTypesSeeder extends Seeder
{
    public function run(): void
    {
        // tipos de personas identificados
        // cliente
        // empleado
        // proveedor
        // compania
        $data = [
            ["name" => "Proveedor", "code" => "pr"],
            ["name" => "Compania", "code" => "co"],
            ["name" => "Empleado", "code" => "em"],
            ["name" => "Cliente", "code" => "cl"],
        ];
        foreach ($data as $types) {
            PersonType::create($types);
        }
    }
}
