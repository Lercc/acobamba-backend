<?php

namespace App\Http\Controllers\Expedient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Expedient;
use App\Http\Resources\ProcessorResource;

class ExpedientProcessorController extends Controller
{
    public function index(Expedient $expedient) {
        if ($expedient->processor_id) {
            $processor = $expedient->processor;
            return new ProcessorResource($processor);
        } else {
            return response()->json([
                'message' => 'El expediente no fue presentado por un tramitante'
            ]);
        }
    }

}
