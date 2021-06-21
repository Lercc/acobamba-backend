<?php

namespace App\Http\Controllers\Derivation;

use App\Models\Derivation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\DerivationRequest;
use App\Http\Resources\DerivationResource;
use App\Http\Resources\DerivationCollection;

class DerivationController extends Controller
{

    public function index()
    {
        $derivations = Derivation::paginate(15);
        return new DerivationCollection($derivations);
    }


    public function store(DerivationRequest $request)
    {
        $derivation = Derivation::create($request->validated());
        return new DerivationResource($derivation);
    }


    public function show(Derivation $derivation)
    {
        return new DerivationResource($derivation);
    }


    public function update(Request $request, Derivation $derivation)
    {
        //
    }


    public function destroy(Derivation $derivation)
    {
        //
    }
}
