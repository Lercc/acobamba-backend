<?php

namespace App\Http\Controllers\Derivation;

use App\Models\Derivation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ExpedientResource;

class DerivationExpedientController extends Controller
{
    public function index(Derivation $derivation) {
        $expedient = $derivation->expedient;
        return new ExpedientResource($expedient);
    }
    
    public function indexState(Derivation $derivation) {
        $expedients = Derivation::select('')->where('employee_id', $employee->id)->orderBy('id','desc')->paginate(15);
        if(count($expedients) != 0) {
            return new ExpedientCollection($expedients);
        } else {
            return response()->json([
                'message' => 'El empleado no tiene expedientes presentados'
            ], 404);
        }
    }
}
