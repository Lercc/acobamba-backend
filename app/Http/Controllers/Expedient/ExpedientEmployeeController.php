<?php

namespace App\Http\Controllers\Expedient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Expedient;
use App\Http\Resources\ProcessorResource;

class ExpedientEmployeeController extends Controller
{
    public function index(Expedient $expedient) {
        if ($expedient->employee_id) {
            $employee = $expedient->employee;
            return new ProcessorResource($employee);
        } else {
            return response()->json([
                'message' => 'El expediente no fue presentado por un empleado'
            ]);
        }
    }
}
