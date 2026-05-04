<?php

namespace Modules\IAM\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\IAM\Models\Permission;
use Modules\IAM\Models\Role;

class PermissionsSeeder extends Seeder
{
    public function run(): void
    {
        $modules = ["Modules/HumanResources/config/permissions.php"];

        $permissionsAlt = [];

        foreach ($modules as $path) {
            $config = require base_path($path);

            foreach ($config["permissions"] as $perm) {
                $permissionsAlt[] = [
                    "module" => $config["module"],
                    "resource" => $perm["resource"],
                    "action" => $perm["action"],
                    "roles" => $perm["roles"],
                ];
            }
        }

        foreach ($permissionsAlt as $perm) {
            $permission = Permission::firstOrCreate([
                "module" => $perm["module"],
                "resource" => $perm["resource"],
                "action" => $perm["action"],
            ]);

            foreach ($perm["roles"] as $roleName) {
                $role = Role::where("name", $roleName)->first();

                if ($role) {
                    $role
                        ->permissions()
                        ->syncWithoutDetaching([$permission->id]);
                }
            }
        }
    }
}
