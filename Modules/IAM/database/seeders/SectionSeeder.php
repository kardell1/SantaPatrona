<?php

namespace Modules\IAM\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\IAM\Models\Section;

class SectionSeeder extends Seeder
{
    public function run(): void
    {
        $sections = [
            // ===========================================================================================
            // =================================== Recursos humanos ======================================
            // ===========================================================================================

            [
                'code' => 'human-resources', // sub seccion de ingreso
                'label' => 'Empleados', // lo que mostramos visualmente
                'path' => 'rrhh', // este campo quizas no sea necesario
                'father' => null, // a que seccion perteneces
                'icon' => 'people',
            ],
            [
                'code' => 'employees', // sub seccion de ingreso
                'label' => 'Internos',
                'path' => 'rrhh', // este campo quizas no sea necesario
                'father' => 'human-resources', // a que seccion perteneces
                'icon' => 'people',
            ],
            [
                'code' => 'rrhh-config',
                'label' => 'Configuracion',
                'path' => 'rrhh',
                'father' => 'human-resources',
                'icon' => 'people',
            ],

            // ===========================================================================================
            // =================================== Inventarios  ==========================================
            // ===========================================================================================
            [
                'code' => 'inventories',
                'label' => 'Inventarios',
                'path' => 'inventories',
                'father' => null,
                'icon' => 'cash',
            ],
            [
                'code' => 'products',
                'label' => 'Productos',
                'path' => 'inventories',
                'father' => 'inventories',
                'icon' => null,
            ],
            [
                'code' => 'branches',
                'label' => 'Sucursales',
                'path' => 'inventories',
                'father' => 'inventories',
                'icon' => null,
            ],
            [
                'code' => 'inventories-config',
                'label' => 'Configuracion',
                'father' => 'inventories',
                'path' => 'inventories',
                'icon' => null,
            ],
            // ===========================================================================================
            // =================================== Ordenes ===============================================
            // ===========================================================================================
            [
                'code' => 'orders',
                'label' => 'Ordenes de compra',
                'path' => 'orders',
                'father' => null,
                'icon' => 'purchaseOrders',
            ],
            [
                'code' => 'providers',
                'label' => 'Proveedores',
                'path' => 'orders',
                'father' => 'orders',
                'icon' => null,
            ],
            [
                'code' => 'orders-config',
                'label' => 'Configuracion',
                'father' => 'orders',
                'path' => 'orders',
                'icon' => null,
            ],
            // ===========================================================================================
            // =================================== Cotizaciones ==========================================
            // ===========================================================================================
            [
                'code' => 'quotations',
                'label' => 'Cotizaciones',
                'path' => 'quotations',
                'father' => null,
                'icon' => 'quotations',
            ],
            [
                'code' => 'clients',
                'label' => 'Clientes',
                'path' => 'quotations',
                'father' => 'quotations',
                'icon' => null,
            ],
            [
                'code' => 'quotations-config',
                'label' => 'Configuracion',
                'father' => 'quotations',
                'path' => 'quotations',
                'icon' => null,
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
                'path' => $uiSection['path'],
            ]);

        }
    }
}
