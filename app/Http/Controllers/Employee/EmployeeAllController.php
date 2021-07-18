<?php

namespace App\Http\Controllers\Employee;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\EmployeeCollection;

class EmployeeAllController extends Controller
{
    public function getEmployeeAll()
    {
        $employees = Employee::get();
        return new EmployeeCollection($employees);
    }
}
