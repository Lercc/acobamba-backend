<?php

namespace App\Http\Controllers\Expedient;

use App\Models\Expedient;
use App\Models\Derivation;
use App\Http\Controllers\Controller;
use App\Http\Resources\DerivationCollection;
use Illuminate\Http\Request;

class ExpedientDerivationController extends Controller
{
    public function index(Expedient $expedient) {
        $derivations = Derivation::where('expedient_id', $expedient->id)->paginate(15);
     
        if (sizeof($derivations) != 0) {
            return new DerivationCollection($derivations);
        } else {
            return response()->json([
                'message' => 'El expediente no tiene derivaciones'
            ], 200);
        }
    }
}
