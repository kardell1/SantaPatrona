<?php

namespace Modules\HumanResources\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Supports\NormalizedResponse;
use Illuminate\Http\Request;
use Modules\HumanResources\Models\EmployeeType;

class EmployeeTypeController extends Controller
{
    public function index()
    {
        $employeeTypes = EmployeeType::select('name' , 'id')->get();
        return NormalizedResponse::success($employeeTypes , 'Consulta existosa.');
    }

    public function store(Request $request) {}

    public function show($id)
    {
        return view('humanresources::show');
    }

    public function update(Request $request, $id) {}

    public function destroy($id) {}
}
