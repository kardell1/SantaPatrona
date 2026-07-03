<?php

namespace Modules\HumanResources\Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Modules\HumanResources\Models\Employee;
use Modules\HumanResources\Models\EmployeeType;
use Modules\HumanResources\Models\Person;
use Modules\HumanResources\Models\PersonType;
use Modules\HumanResources\Models\Position;
use Modules\HumanResources\Models\Profile;
use Modules\IAM\Models\Role;

class EmployeeSeeder extends Seeder
{
    public function run(): void
    {
        $employees = [
            [
                // datos de usuario
                "auth" => [
                    "username" => "kardell",
                    "password" => "admin123",
                ],
                // datos de role
                "role" => "super_administrator",
                // datos de persona
                "person" => [
                    "name" => "kardell",
                    "email" => "kardell@gmail.com",
                    "cellphone" => "72089710",
                ],
                // datos de perfil
                "profile" => [
                    "paternal_lastname" => "Sharpeye",
                    "maternal_lastname" => "Can",
                ],
                // datos de empleado
                "employee" => [
                    "salary" => "10600",
                    "start_date" => "1/9/2025",
                    "position" => "Gerente general",
                    'employee_type' => 'interno',
                ],
                // tipo de persona
                "type" => "natural",
            ],
            [
                "auth" => [
                    "username" => "jefita123",
                    "password" => "admin123",
                ],
                "role" => "owner",
                "person" => [
                    "name" => "Adriana",
                    "email" => "Adriana@gmail.com",
                    "cellphone" => "72089708",
                ],
                "profile" => [
                    "paternal_lastname" => "Valencia",
                    "maternal_lastname" => "Canedo",
                ],
                "employee" => [
                    "salary" => "3500",
                    "start_date" => "1/9/2025",
                    "position" => "Vendedor",
                    'employee_type' => 'interno',
                ],
                "type" => "natural",
            ],
            [
                "auth" => [
                    "username" => "recepcion123",
                    "password" => "admin123",
                ],
                "role" => "staff",
                "person" => [
                    "name" => "joaquin",
                    "email" => "joaquin@gmail.com",
                    "cellphone" => "72089708",
                ],
                "profile" => [
                    "paternal_lastname" => "mendoza",
                    "maternal_lastname" => "mendoza",
                ],

                "employee" => [
                    "salary" => "3500",
                    "start_date" => "1/9/2025",
                    "position" => "Administrador",
                    'employee_type' => 'pasante',
                ],
                "type" => "natural",
            ],

            [
                "auth" => [
                    "username" => "pasante123",
                    "password" => "admin123",
                ],
                "role" => "intern",
                "person" => [
                    "name" => "maribel",
                    "email" => "maribel@gmail.com",
                    "cellphone" => "72089708",
                ],

                "employee" => [
                    "salary" => "3500",
                    "start_date" => "1/9/2025",
                    "position" => "Administrador",
                    'employee_type' => 'pasante',
                ],
                "profile" => [
                    "paternal_lastname" => "espina",
                    "maternal_lastname" => "flores",
                ],
                "type" => "natural",
            ],
        ];

        foreach ($employees as $index => $employee) {
            $found_role = Role::where("name", $employee["role"])->first();

            $new_user = User::create([
                // "email" => $employee["person"]["email"],
                "password" => $employee["auth"]["password"],
                "username" => $employee["auth"]["username"],
                "role_id" => $found_role->id,
            ]);

            $foundPersonType = PersonType::firstOrCreate([
                'name' => $employee['type'],
            ]);

            $new_person = Person::create([
                "first_name" => $employee["person"]["name"],
                "phone" => $employee["person"]["cellphone"] . $index,
                "email" => $employee["person"]["email"],
            ]);

            $new_person->personTypes()->attach($foundPersonType->id);
            Profile::create([
                "person_id" => $new_person->id,
                "paternal_lastname" =>
                $employee["profile"]["paternal_lastname"],
                "maternal_lastname" =>
                $employee["profile"]["maternal_lastname"],
                // "gender" => null,
            ]);

            $foundPosition = Position::where('name', $employee['employee']['position'])->first();

            $foundEmployeeType = EmployeeType::where('name' , $employee['employee']['employee_type'])->first();

            Employee::create([
                "salary" => $employee["employee"]["salary"],
                "person_id" => $new_person->id,
                "start_date" => $employee["employee"]["start_date"],
                "end_date" => null,
                "user_id" => $new_user->id,
                "position_id" => $foundPosition->id,
                'employee_type_id' => $foundEmployeeType->id
            ]);
        }
    }
}
