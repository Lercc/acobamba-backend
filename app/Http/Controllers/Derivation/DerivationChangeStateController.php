<?php

namespace App\Http\Controllers\Derivation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\DerivationChangeStateRequest;
use App\Models\Derivation;
use App\Http\Resources\DerivationResource;

class DerivationChangeStateController extends Controller
{
    public function changeState(DerivationChangeStateRequest $request, Derivation $derivation) {
        $derivation->update($request->validated());
        return new DerivationResource($derivation);
    }
}
