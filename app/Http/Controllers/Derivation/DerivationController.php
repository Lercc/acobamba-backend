<?php

namespace App\Http\Controllers\Derivation;

use App\Models\Derivation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\DerivationRequest;
use App\Http\Resources\DerivationResource;
use App\Http\Resources\DerivationCollection;
use App\Http\Requests\DerivationUpdateRequest;

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


    public function update(DerivationUpdateRequest $request, Derivation $derivation)
    {
      $derivation->update($request->validated());
      return new DerivationResource($derivation);
    }


    public function destroy(Derivation $derivation)
    {
        $derivation->delete();  
    }

    public function changeStatusDerivation(Derivation $derivation){
        $derivation = Derivation::findOrFail($derivation->id); 
        $derivation->status = 'en proceso';
        $derivation->update(); 
    }
}
