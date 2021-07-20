<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeSecretariaController extends Controller
{
    public function getData()
    {
        $secretaria = Employee::select('employees.*')
                                ->join('offices', 'offices.id', '=', 'employees.office_id')
                                ->where('employees.office_id', '=', '10')
                                ->orWhere('employees.office_id', '=', 'Oficina de trámite Documentario')
                                ->where('employees.employee_type', '=','secretaria')
                                ->value('id');
                                // ->get();
        return $secretaria;
    }

}
