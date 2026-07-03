<?php

namespace Modules\HumanResources\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Supports\NormalizedResponse;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Modules\HumanResources\Filters\EmployeeFilters;
use Modules\HumanResources\Http\Formatters\EmployeeFormatter;
use Modules\HumanResources\Http\Requests\EmployeeConfigurationStoreRequest;
use Modules\HumanResources\Models\Employee;
use Modules\HumanResources\Models\Person;
use Modules\HumanResources\Models\PersonDetail;
use Modules\HumanResources\Models\Profile;

class EmployeeConfigurationController extends Controller
{
    protected $employeeFilters;
    protected $employeeFormatter;

    public function __construct(
        EmployeeFilters $employeeFilters,
        EmployeeFormatter $employeeFormatter
    ) {
        $this->employeeFilters = $employeeFilters;
        $this->employeeFormatter = $employeeFormatter;
    }


    public function index(Request $request)
    {
        $query = Employee::query();

        $query = $this->employeeFilters->apply(
            $query,
            $request->all()
        );

        $formatter = $this->employeeFormatter->cleanIndexEmployee($query->get());

        return NormalizedResponse::success($formatter, "Busqueda de empleados");
    }

    public function store(EmployeeConfigurationStoreRequest $request)
    {
        try {

            $data =  DB::transaction(function () use ($request) {

                $validated = $request->validated();

                $newUser = User::create([
                    'username' => $validated['username'],
                    'password' => bcrypt($validated['password']),
                    'is_locked' => $validated['is_locked'],
                    'role_id' => $validated['role_id']
                ]);

                $newPerson = Person::create([
                    'first_name' => $validated['first_name'],
                    'email' => $validated['email'],
                    'phone' => $validated['phone'],
                ]);

                PersonDetail::create([
                    'person_id' => $newPerson->id,
                    'identifier_type' => $validated['identification_type'],
                    'identifier_id' => $validated['identification_id'],
                ]);

                Profile::create([
                    'person_id' => $newPerson->id,
                    'middle_name' => $validated['middle_name'],
                    'maternal_lastname' => $validated['maternal_lastname'],
                    'paternal_lastname' => $validated['paternal_lastname'],
                    'age' => $validated['age'],
                ]);

                $newEmployee = Employee::create([
                    'user_id' => $newUser->id,
                    'person_id' => $newPerson->id,
                    'position_id' => $validated['position_id'],
                    'salary' => $validated['salary'],
                    'start_date' => $validated['start_date'],
                    'end_date' => null,
                    'employee_type_id' => $validated['type_id'],
                ]);

                $newUser->branches()->attach($validated['branches']);

                return $newEmployee;
            });
            return NormalizedResponse::success($data, 'Creado correctamente');
        } catch (\Throwable $th) {

            return NormalizedResponse::error("Errores al crear", $th->getMessage());
        }
    }    // visualizacion de los datos del empleado

    // Que los datos se parezcan al post , para que podamos usar el mismo form
    public function show(int $id)
    {
        try {

            $data = Employee::with([
                'user:id,username',
                'user.branches:id,name',
                'user.role:id,name,description',

                'position:id,name',

                'person:id,first_name,email,phone',

                'person.personTypes:id,name,description',

                'person.profile:id,person_id,middle_name,paternal_lastname,maternal_lastname,age',

                'person.personDetails:id,person_id,identifier_type,identifier_id',
            ])
                ->select(
                    'id',
                    'salary',
                    'user_id',
                    'person_id',
                    'position_id'
                )
                ->find($id);

            return NormalizedResponse::success(
                $data,
                'Consulta realizada correctamente'
            );
        } catch (\Throwable $e) {

            return NormalizedResponse::error(
                [
                    'message' => $e->getMessage(),
                    'file' => $e->getFile(),
                    'line' => $e->getLine(),
                ],
                'Consulta realizada correctamente'
            );
        }
    }

    // actualizacion de todos los datos del empleado
    public function update(Request $request, $id)
    {
        // permite actualizar todos sus datos del empleado
    }

    // dar de baja al empleado
    public function destroy($id)
    {
        // el empleado es dado de baja
    }
}
