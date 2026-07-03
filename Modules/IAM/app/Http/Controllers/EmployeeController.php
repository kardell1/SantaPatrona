<?php

namespace Modules\IAM\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        return view('iam::index');
    }


    public function store(Request $request) {}

    public function show($id)
    {
        return view('iam::show');
    }


    public function update(Request $request, $id) {}

    public function destroy($id) {}
}
