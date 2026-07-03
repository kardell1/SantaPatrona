<?php

namespace Modules\IAM\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\IAM\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            [
                'code' => 'read', // show
                'label' => 'Lectura'
            ],
            [
                'code' => 'reports', // reportes
                'label' => 'Reportes'
            ],
            [
                'code' => 'create', // creacion
                'label' => 'Creacion'
            ],
            [
                'code' => 'update', // actualizacion
                'label' => 'Edicion'
            ],
            [
                'code' => 'print', // imprimir
                'label' => 'imprimir'
            ],
            [
                'code' => 'download', // descargar
                'label' => 'Descargar'
            ],
            [
                'code' => 'list', // listar tod
                'label' => 'Listado'
            ],
        ];
        foreach ($permissions as $permission) {
            $newPermission = Permission::create($permission);
        }
    }
}
