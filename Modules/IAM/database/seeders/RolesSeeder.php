<?php

namespace Modules\IAM\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\IAM\Models\Permission;
use Modules\IAM\Models\Role;
use Modules\IAM\Models\Section;

class RolesSeeder extends Seeder
{
    public function run(): void
    {
        // roles identificados
        // Jefe o propietarios
        // meseros / cajeros
        // pasantes
        $roles = [
            // con el hijo deberiamos saber el padre
            // perfil de sistemas o jefe
            [
                "name" => "super_administrator",
                "description" => "Super administrador del sistema",
                'sections' => [
                    'employees' => ['read', 'reports', 'create', 'update', 'print', 'download', 'list'],
                    'rrhh-config' => ['read', 'reports', 'create', 'update', 'print', 'download', 'list'],
                    'third-persons' => ['read', 'reports', 'create', 'update', 'print', 'download', 'list'],
                    'products' => ['read', 'reports', 'create', 'update', 'print', 'download', 'list'],
                    'transfer-inventories' => ['read', 'reports', 'create', 'update', 'print', 'download', 'list'],
                    'inventories-config' => ['read', 'reports', 'create', 'update', 'print', 'download', 'list'],
                ]
            ],
            [
                "name" => "administrator",
                "description" => "Administrador del sistema",
                'sections' => [
                    'employees' => ['read', 'reports', 'create', 'update', 'print', 'download', 'list'],
                    'rrhh-config' => ['read', 'reports', 'create', 'update', 'print', 'download', 'list'],
                    'third-persons' => ['read', 'reports', 'create', 'update', 'print', 'download', 'list'],
                ]
            ],
            [
                "name" => "owner",
                "description" => "Propietario o jefe del negocio",
                'sections' => [
                    'employees' => ['read', 'reports', 'create', 'update', 'print', 'download', 'list'],
                    'rrhh-config' => ['read', 'reports', 'create', 'update', 'print', 'download', 'list'],
                    'third-persons' => ['read', 'reports', 'create', 'update', 'print', 'download', 'list'],
                ]
            ],
            [
                "name" => "staff",
                "description" => "Empleado operativo como mesero o cajero",
                'sections' => [
                    'employees' => ['read', 'list'],
                    'rrhh-config' => ['read', 'list'],
                    'third-persons' => ['read', 'list'],
                ]
            ],
            [
                "name" => "intern",
                "description" => "Pasante o personal en entrenamiento",
                'sections' => [
                    'products' => ['read', 'list'],
                    'transfer-inventories' => ['read', 'list'],
                ]
            ],
        ];

        foreach ($roles as $roleData) {

            $role = Role::create([
                'name' => $roleData['name'],
                'description' => $roleData['description']
            ]);

            foreach ($roleData['sections'] as $code => $permissions) {
                $foundSection = Section::where('code', $code)->first();
                $role->sections()->attach($foundSection->id);

                foreach($permissions as $permission){
                    $foundPermission = Permission::where('code' , $permission)->first();
                    $foundSection->permissions()->attach($foundPermission->id);
                }
            }
        }
    }
}
