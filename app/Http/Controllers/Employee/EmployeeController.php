<?php

namespace App\Http\Controllers\Employee;

use App\Models\User;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeRequest;
use App\Http\Requests\EmployeeUpdateRequest;
use App\Http\Resources\EmployeeResource;
use App\Http\Resources\EmployeeCollection;
use Illuminate\Support\Facades\DB;


class EmployeeController extends Controller
{

    public function index()
    {
        $employees = Employee::orderBy('id','desc')->paginate(8);
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
        } catch (Exception $e){
            DB::rollBack();
        }
        return new EmployeeResource($employee);
    }


    public function show(Employee $employee)
    {
        return new EmployeeResource($employee);
    }


    public function update(EmployeeUpdateRequest $request, Employee $employee)
    {
        // campos que se van a actualizar
        // USER : 'role_id', 'name', 'last_name', 'doc_type', 'doc_number', 'email', 'status'
        // EMPLEADO : 'user_id', 'office_id', 'suboffice_id',  'employee_type'
        try {
           DB::beginTransaction();

           // user
           $user = User::find($employee->user_id);
           $user->update($request->except(['id']));
           
           // employee
           $employee->update($request->validated());

           DB::commit();
        } catch (Exception $e) {
            DB::rollback();
        }
        return new EmployeeResource($employee);
    }

    public function destroy(Employee $employee)
    {
        //
    }
}
