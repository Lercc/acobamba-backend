<?php

namespace App\Http\Controllers\Employee;

use Carbon\Carbon;
use App\Models\Employee;
use App\Models\Expedient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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

    public function searchExpedientEmployee(Request $request){

        $buscar = $request->buscar;
        $criterio = $request->criterio;
        if ($buscar==''){
            $expedients = Expedient::where('employee_id', $request->id)->paginate(15);
            return new ExpedientCollection($expedients);
        }
        else{
            $expedients = Expedient::where('employee_id', $request->id)->where('expedients.'.$criterio, 'like', '%'. $buscar . '%')
            ->orderBy('expedients.id', 'desc')->paginate(10);
            return new ExpedientCollection($expedients);
        }
    }
    public function searchExpedientEmployeeDate(Request $request){

        $buscar = $request->buscar;
        $from = $request->from;
   //     $until = Carbon::now('America/Lima');
        $until = $request->until ; 

        if ($buscar==''){
            $expedients = Expedient::where('employee_id', $request->id)->get();
            return new ExpedientCollection($expedients);
        }
        else{
            $expedients = Expedient::where('employee_id', $request->id)->whereBetween('created_at', [$from, $until])  
            ->orderBy('expedients.id', 'desc')->get();
            return new ExpedientCollection($expedients);
        }
    }
}

