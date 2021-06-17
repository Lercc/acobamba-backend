<?php

namespace App\Http\Controllers\Employee;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\EmployeeResource;
use App\Http\Resources\EmployeeCollection;

class EmployeeController extends Controller
{

    public function index()
    {
        $employees = Employee::paginate(6);
        return new EmployeeCollection($employees);
    }

    public function store(Request $request)
    {
        //
    }


    public function show(Employee $employee)
    {
        return new EmployeeResource($employee);
    }


    public function update(Request $request, Employee $employee)
    {
        //
    }

    public function destroy(Employee $employee)
    {
        //
    }
}
