<?php

namespace App\Http\Controllers\Employee;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\SubofficeResource;

class EmployeeSubofficeController extends Controller
{
    public function index(Employee $employee) {
        $suboffice = $employee->suboffice;
        return new SubofficeResource($suboffice);
    }
}
