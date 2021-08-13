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
        $derivations = Derivation::where('employee_id', $employee->id)->orderBy('id', 'desc')->paginate(15);    
 
        if (sizeof($derivations) != 0 ) {
          return new DerivationCollection($derivations);
           
        } else {
            return response()->json([
                'message' => 'El encargado no tiene derivaciones realizadas'
            ], 200);
        }
    }

    public function searchDerivationEmployeeDate(Request $request){
        // $buscar = $request->buscar;
        $from = $request->start;
        $until = $request->end ; 

        // if ($buscar==''){
        //     $expedients = Derivation::where('employee_id', $request->id)->get();
        //     return new DerivationCollection($expedients);
        // }
        // else{
        //     $expedients = Derivation::where('employee_id', $request->id)->whereBetween('created_at', array($from,$until))
        //     ->orderBy('derivations.id', 'desc')->get();
        //     return new DerivationCollection($expedients);
        // }

        // return $from;

        // $expedients = Derivation::where('employee_id', $request->id)->whereBetween('created_at', [$from,$until])
        //     ->orderBy('derivations.id', 'desc')->get();
        //     return $expedients;
        //     return new DerivationCollection($expedients);
       
        $expedients = Derivation::where('employee_id', $request->id)
            ->where('created_at', '>=', $from)
            ->where('created_at', '<', $until ) 
            ->orderBy('derivations.id', 'desc')->get();
            // return $from;
            return new DerivationCollection($expedients);
    }
}
