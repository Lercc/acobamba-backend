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
}
