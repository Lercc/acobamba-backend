<?php

namespace App\Http\Controllers\Derivation;

use App\Models\Derivation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//falta importar el expediente resource

class DerivationExpedientController extends Controller
{
    public function index(Derivation $derivation) {
        $expedient = $derivation->expedient;
        return new ExpedientResource($expedient);
    }
}
