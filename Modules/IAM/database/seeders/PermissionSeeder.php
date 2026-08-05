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
                'code' => 'read', // GET /{id}
                'label' => 'Lectura',
            ], // Ver el detalle de un registro.

            [
                'code' => 'list', // GET /
                'label' => 'Listado',
            ], // Listar y buscar registros.

            [
                'code' => 'create', // POST
                'label' => 'Creación',
            ], // Crear nuevos registros.

            [
                'code' => 'update', // PUT/PATCH
                'label' => 'Edición',
            ], // Modificar registros existentes.

            [
                'code' => 'delete', // DELETE
                'label' => 'Eliminación',
            ], // Eliminar registros.

            [
                'code' => 'reports',
                'label' => 'Reportes',
            ], // Acceder y generar reportes del módulo.

            [
                'code' => 'print',
                'label' => 'Imprimir',
            ], // Imprimir documentos o reportes.

            [
                'code' => 'download',
                'label' => 'Descargar',
            ], // Exportar información (PDF, Excel, CSV, etc.).

            [
                'code' => 'approve',
                'label' => 'Aprobar',
            ], // Aprobar documentos o procesos (cotizaciones, órdenes, solicitudes, etc.).

            [
                'code' => 'cancel',
                'label' => 'Cancelar',
            ], // Cancelar documentos sin eliminarlos del sistema.

            [
                'code' => 'restore',
                'label' => 'Restaurar',
            ], // Restaurar registros eliminados lógicamente (soft delete).
        ];
        foreach ($permissions as $permission) {
            $newPermission = Permission::create($permission);
        }
    }
}
