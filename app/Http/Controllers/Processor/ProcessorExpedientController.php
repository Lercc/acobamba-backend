<?php

namespace App\Http\Controllers\Processor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Processor;
use App\Models\Expedient;
use App\Http\Resources\ExpedientCollection;

class ProcessorExpedientController extends Controller
{
    public function index(Processor $processor) {
        $expedients = Expedient::where('processor_id', $processor->id)->orderBy('id','desc')->paginate(15);
        if (sizeof($expedients) != 0) {
            return new ExpedientCollection($expedients);
        } else {
            return response()->json([
                'message' => 'El tramitante no tiene expedientes pendientes de revisión'
            ]);
        }
    }
    
    public function searchExpedient(Request $request){

        $buscar = $request->buscar;
        $criterio = $request->criterio;
        if ($buscar==''){
            $expedients = Expedient::where('processor_id', $request->id)->paginate(15);
            return new ExpedientCollection($expedients);
        }
        else{
            $expedients = Expedient::where('processor_id', $request->id)->where('expedients.'.$criterio, 'like', '%'. $buscar . '%')
            ->orderBy('expedients.id', 'desc')->paginate(10);
            return new ExpedientCollection($expedients);
        }
    }
}
