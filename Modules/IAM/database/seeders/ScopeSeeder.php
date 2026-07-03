<?php

namespace Modules\IAM\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\IAM\Models\Scope;

class ScopeSeeder extends Seeder
{
    public function run(): void
    {
        $scopes = [
            [
                'code' => 'branch',
                'label' => 'Sucursal' // Solo recursos pertenecientes a la sucursal del usuario.
            ],
            [
                'code' => 'company',
                'label' => 'Empresa' // Recursos de toda la empresa.
            ],
            [
                'code' => 'own',
                'label' => 'Propios' // Solo recursos creados por el usuario.
            ],
            [
                'code' => 'self',
                'label' => 'Propio' // Solo información del propio usuario.
            ],
            [
                'code' => 'assigned',
                'label' => 'Asignados' // Solo recursos asignados al usuario.
            ],
            [
                'code' => 'system',
                'label' => 'Sistema' // Acceso sin restricciones a todos los recursos del sistema.
            ]
        ];
        foreach($scopes as $scope){
            Scope::create($scope);
        }
    }
}
