<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeSecretariaController extends Controller
{
    public function getData()
    {
        $secretaria = Employee::select('employees.id')
                                ->join('offices', 'offices.id', '=', 'employees.office_id')
                                ->where('offices.id', '=', 10)
                                ->value('id');
        return $secretaria;
    }

}
