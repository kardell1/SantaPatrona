<?php

namespace Modules\IAM\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\IAM\Models\Role;

class RolesSeeder extends Seeder
{
    public function run(): void
    {
        // roles identificados
        // Jefe o propietarios
        // meseros / cajeros
        // pasantes
        $roles = [
            // perfil de sistemas o jefe
            [
                "name" => "super_administrator",
                "description" => "Super administrador del sistema",
            ],
            [
                "name" => "administrator",
                "description" => "Administrador del sistema",
            ],
            [
                "name" => "owner",
                "description" => "Propietario o jefe del negocio",
            ],
            [
                "name" => "staff",
                "description" => "Empleado operativo como mesero o cajero",
            ],
            [
                "name" => "intern",
                "description" => "Pasante o personal en entrenamiento",
            ],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
