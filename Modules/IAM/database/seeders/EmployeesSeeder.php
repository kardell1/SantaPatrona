<?php

namespace Modules\IAM\Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Modules\IAM\Models\Employee;
use Modules\IAM\Models\Person;
use Modules\IAM\Models\PersonType;
use Modules\IAM\Models\Profile;
use Modules\IAM\Models\Role;

class EmployeesSeeder extends Seeder
{
    public function run(): void
    {
        // creacion de empleados basicos
        $employees = [
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
                ],
                "type" => "em",
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
                ],
                "type" => "em",
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
                ],
                "profile" => [
                    "paternal_lastname" => "espina",
                    "maternal_lastname" => "flores",
                ],
                "type" => "em",
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

            $found_person_type = PersonType::where(
                "code",
                $employee["type"],
            )->first();

            $new_person = Person::create([
                "name" => $employee["person"]["name"],
                "cellphone" => $employee["person"]["cellphone"] . $index,
                "email" => $employee["person"]["email"],
            ]);

            $new_person->personType()->attach($found_person_type->id);
            Profile::create([
                "person_id" => $new_person->id,
                "paternal_lastname" =>
                    $employee["profile"]["paternal_lastname"],
                "maternal_lastname" =>
                    $employee["profile"]["maternal_lastname"],
                // "gender" => null,
                // poner estas dos cosas mas en el seeder
                "identification_type" => "`",
                "identification_number" => "`",
            ]);
            Employee::create([
                "salary" => $employee["employee"]["salary"],
                "person_id" => $new_person->id,
                "start_date" => $employee["employee"]["start_date"],
                "end_date" => null,
                "user_id" => $new_user->id,
            ]);
        }
    }
}
