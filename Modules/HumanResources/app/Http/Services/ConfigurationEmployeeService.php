<?php

namespace Modules\HumanResources\Http\Services;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Modules\HumanResources\Models\Employee;
use Modules\HumanResources\Models\Person;
use Modules\HumanResources\Models\PersonDetail;
use Modules\HumanResources\Models\Profile;

class ConfigurationEmployeeService
{

    // Funcion para actualizar  datos especificos del usuario , sirve para
    // configuracion total (vista para el dueno ), y configuracion parcial (vista para el empleado )
    public function updatePartial(array $formValidated) {}
    public function storeEmployee(array $formValidated)
    {
        $newUser = User::create([
            "email" => $formValidated['email'],
            "password" => $formValidated['password'],
            "username" =>  $formValidated['username'],
            'is_locked' => false,
            'role_id' => $formValidated['role_id']
        ]);

        $newUser->branches()->attach($formValidated['branches']);

        $newPerson = Person::create([
            "first_name" => $formValidated['name'],
            "email" => $formValidated['email'],
            "phone" => $formValidated['phone']
        ]);

        Profile::create([
            'middle_name' => $formValidated['second_name'],
            'maternal_lastname' => $formValidated['maternal_lastname'],
            'paternal_lastname' => $formValidated['paternal_lastname'],
            'person_id' => $newPerson->id,
            'age' => $formValidated['age'],
        ]);

        PersonDetail::create([
            'person_id' => $newPerson->id,
            'identifier_type' => $formValidated['identification_type'],
            'identifier_id' => $formValidated['identification_id']
        ]);

        Employee::create([
            'user_id' => $newUser->id,
            'person_id' => $newPerson->id,
            'position_id' => $formValidated['position_id'],
            'salary' => $formValidated['salary'],
            'start_date' => now(),
            'end_date' => null,
        ]);
    }

    public function updateEmployee(Employee $employee, array $formValidated): void
    {
        DB::transaction(function () use ($employee, $formValidated) {

            $user = $employee->user;
            $person = $employee->person;
            $profile = $person->profile;
            $personDetail = $person->personDetail;

            // Usuario
            $user->update([
                'email' => $formValidated['email'],
                'username' => $formValidated['username'],
                'role_id' => $formValidated['role_id'],
            ]);

            if (!empty($formValidated['password'])) {
                $user->update([
                    'password' => bcrypt($formValidated['password'])
                ]);
            }

            // Sucursales
            $user->branches()->sync($formValidated['branches']);

            // Persona
            $person->update([
                'first_name' => $formValidated['name'],
                'email' => $formValidated['email'],
                'phone' => $formValidated['phone'],
            ]);

            // Perfil
            $profile->update([
                'middle_name' => $formValidated['second_name'],
                'paternal_lastname' => $formValidated['paternal_lastname'],
                'maternal_lastname' => $formValidated['maternal_lastname'],
                'age' => $formValidated['age'],
            ]);

            // Documento
            $personDetail->update([
                'identifier_type' => $formValidated['identification_type'],
                'identifier_id' => $formValidated['identification_id'],
            ]);

            // Empleado
            $employee->update([
                'position_id' => $formValidated['position_id'],
                'salary' => $formValidated['salary'],
            ]);
        });
    }
}
