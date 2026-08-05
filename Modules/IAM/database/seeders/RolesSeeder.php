<?php

namespace Modules\IAM\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\IAM\Models\Permission;
use Modules\IAM\Models\PermissionRoleSection;
use Modules\IAM\Models\Role;
use Modules\IAM\Models\Section;

class RolesSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            [
                'name' => 'super_administrator',
                'description' => 'Super administrador del sistema',
                'sections' => [
                    // Recursos Humanos
                    'employees' => ['read'],
                    'rrhh-config' => ['read', 'reports', 'create', 'update', 'delete', 'print', 'download', 'list'],

                    // Inventarios
                    'products' => ['read', 'reports', 'update', 'delete', 'print', 'download', 'list'],
                    'branches' => ['read', 'reports', 'create', 'update', 'delete', 'print', 'download', 'list'],
                    'inventories-config' => ['read', 'reports', 'create', 'update', 'delete', 'print', 'download', 'list'],

                    // Compras
                    'providers' => ['read', 'reports', 'create', 'update', 'delete', 'print', 'download', 'list'],
                    'orders-config' => ['read', 'reports', 'create', 'update', 'delete', 'print', 'download', 'list'],

                    // Ventas
                    'clients' => ['read', 'reports', 'create', 'update', 'delete', 'print', 'download', 'list'],
                    'quotations-config' => ['read', 'reports', 'create', 'update', 'delete', 'print', 'download', 'list'],
                ],
            ],

            [
                'name' => 'administrator',
                'description' => 'Administrador del negocio',
                'sections' => [
                    // RRHH
                    'employees' => ['read', 'reports', 'create', 'update', 'print', 'download', 'list'],
                    // Inventario
                    'products' => ['read', 'reports', 'create', 'update', 'print', 'download', 'list'],
                    'branches' => ['read', 'create', 'update', 'print', 'list'],

                    // Compras
                    'providers' => ['read', 'create', 'update', 'print', 'list'],

                    // Ventas
                    'clients' => ['read', 'create', 'update', 'print', 'list'],
                ],
            ],

            [
                'name' => 'employee',
                'description' => 'Empleado operativo',
                'sections' => [
                    // Inventario
                    'products' => ['read', 'list'],
                    'branches' => ['read', 'create', 'list'],

                    // Compras
                    'providers' => ['read', 'list'],

                    // Ventas
                    'clients' => ['read', 'create', 'update', 'list'],
                ],
            ],
        ];

        foreach ($roles as $roleData) {

            $role = Role::create([
                'name' => $roleData['name'],
                'description' => $roleData['description'],
            ]);

            foreach ($roleData['sections'] as $code => $permissions) {

                $section = Section::where('code', $code)->firstOrFail();

                foreach ($permissions as $permissionCode) {

                    $permission = Permission::where('code', $permissionCode)->firstOrFail();

                    PermissionRoleSection::create([
                        'role_id' => $role->id,
                        'section_id' => $section->id,
                        'permission_id' => $permission->id,
                    ]);
                }
            }
        }
    }
}
