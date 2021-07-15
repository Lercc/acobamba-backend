<?php

namespace App\Http\Controllers\Employee;

use App\Models\Employee;
use App\Models\Derivation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\DerivationCollection;

class EmployeeDerivationController extends Controller
{
    public function index(Employee $employee) {
        $derivations = Derivation::where('employee_id', $employee->id)->paginate(15);    
 
        if (sizeof($derivations) != 0 ) {
          return new DerivationCollection($derivations);
           
        } else {
            return response()->json([
                'message' => 'El encargado no tiene derivaciones realizadas'
            ], 200);
        }
    
    }
    
}
