<?php

namespace Modules\HumanResources\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\HumanResources\Models\Position;

class PositionSeeder extends Seeder
{
    public function run(): void
    {
        $positions = [
            [
                "name" => "Vendedor",
                "description" => "Enfocado a realizar la venta en el establecimiento"
            ],
            [
                "name" => "Administrador",
                "description" => "Enfocado en llevar tareas menores contables y registro de inventarios en la aencia"
            ],
            [
                "name" => "Gerente general",
                "description" => "Dueno del negocio, habilitado para realizar todas las operaciones en el sistema"
            ],
        ];
        foreach ($positions as $position) {
            Position::create($position);
        }
    }
}
