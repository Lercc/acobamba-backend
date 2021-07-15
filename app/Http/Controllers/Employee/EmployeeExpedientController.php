<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Expedient;
use App\Http\Resources\ExpedientCollection;

class EmployeeExpedientController extends Controller
{
    public function index(Employee $employee) {
        $expedients = Expedient::where('employee_id', $employee->id)->orderBy('id','desc')->paginate(15);
        if(count($expedients) != 0) {
            return new ExpedientCollection($expedients);
        } else {
            return response()->json([
                'message' => 'El empleado no tiene expedientes presentados'
            ], 404);
        }
    }
}
