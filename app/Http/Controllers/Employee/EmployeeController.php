<?php

namespace App\Http\Controllers\Employee;

use App\Models\User;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeRequest;
use App\Http\Resources\EmployeeResource;
use App\Http\Resources\EmployeeCollection;
use Illuminate\Support\Facades\DB;


class EmployeeController extends Controller
{

    public function index()
    {
        $employees = Employee::paginate(6);
        return new EmployeeCollection($employees);
    }

    public function store(EmployeeRequest $request)
    {
        try{
            // inicializar la transaccion
            DB::beginTransaction();

            // primero creas usuario
            $user = User::create($request->validated());
            $user->password = bcrypt($user->password);
            $user->save();
            
            // segundo creas al empleado
            $employee = new Employee();
            $employee->user_id = $user->id;
            $employee->office_id = $request->office_id ? $request->office_id : null;
            $employee->suboffice_id = $request->suboffice_id ? $request->suboffice_id : null;
            $employee->employee_type = $request->employee_type;
            $employee->save();

            DB::commit();
        }  catch (Exception $e){
            DB::rollBack();
        }

        return new EmployeeResource($employee);

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
