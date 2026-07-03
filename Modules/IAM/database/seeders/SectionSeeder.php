<?php

namespace Modules\IAM\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\IAM\Models\Section;

class SectionSeeder extends Seeder
{
    public function run(): void
    {

        // dominios del sistema
        // Empleados
        // Configuracion
        $sections = [
            [
                'code' => 'human-resources', // sub seccion de ingreso
                'label' => 'Empleados', // lo que mostramos visualmente
                'path' => 'rrhh', // este campo quizas no sea necesario
                'father' => null, // a que seccion perteneces
                'icon' => 'people'
            ],
            [
                'code' => 'employees', // sub seccion de ingreso
                'label' => 'Internos',
                'path' => 'rrhh', // este campo quizas no sea necesario
                'father' => 'human-resources', // a que seccion perteneces
                'icon' => 'people'
            ],
            [
                'code' => 'rrhh-config',
                'label' => 'Configuracion',
                'path' => 'rrhh',
                'father' => 'human-resources',
                'icon' => 'people'
            ],
            [
                'code' => 'third-persons',
                'label' => 'Asociados',
                'father' => 'human-resources',
                'path' => 'rrhh',
                'icon' => 'people'
            ],
            [
                'code' => 'inventories', // sub seccion de ingreso
                'label' => 'Inventarios', // lo que mostramos visualmente
                'path' => 'inventories', // este campo quizas no sea necesario
                'father' => null, // a que seccion perteneces
                'icon' => 'cash'
            ],
            [
                'code' => 'products', // sub seccion de ingreso
                'label' => 'Productos',
                'path' => 'rrhh', // este campo quizas no sea necesario
                'father' => 'inventories', // a que seccion perteneces
                'icon' => null
            ],
            [
                'code' => 'transfer-inventories',
                'label' => 'Transferir items',
                'path' => 'rrhh',
                'father' => 'inventories',
                'icon' => null
            ],
            [
                'code' => 'inventories-config',
                'label' => 'Configuracion',
                'father' => 'inventories',
                'path' => 'rrhh',
                'icon' => null
            ],
        ];
        foreach ($sections as $uiSection) {

            $foundFather = null;
            if ($uiSection['father']) {
                $foundFather = Section::where('code', $uiSection['father'])->first();
            }

            Section::create([
                'code' => $uiSection['code'],
                'label' => $uiSection['label'],
                'icon' => $uiSection['icon'],
                'father_id' => $foundFather?->id,
                'path' => $uiSection['path']
            ]);

        }
    }
}
