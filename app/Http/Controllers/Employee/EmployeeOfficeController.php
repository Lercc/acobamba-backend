<?php

namespace App\Http\Controllers\Employee;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\OfficeResource;

class EmployeeOfficeController extends Controller
{
    public function index(Employee $employee) {
        if ($employee->office_id) {
            $office = $employee->office;
            return new OfficeResource($office);
        } else if ($employee->suboffice_id) {
            $office = $employee->suboffice->office;
            return new OfficeResource($office);
        }
    }
}
