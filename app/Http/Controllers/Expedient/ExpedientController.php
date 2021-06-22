<?php

namespace App\Http\Controllers\Expedient;

use App\Models\Expedient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ExpedientRequest;
use App\Http\Resources\ExpedientResource;
use App\Http\Resources\ExpedientCollection;

class ExpedientController extends Controller
{
    public function index()
    {
        $expedients = Expedient::paginate(15);
        return new ExpedientCollection($expedients);
  
    }

    public function store(ExpedientRequest $request)
    {
   
        $expedient = Expedient::create($request->validated());
        return new ExpedientResource($expedient);
    }

    public function show(Expedient $expedient)
    {
        return new ExpedientResource($expedient);
    }

    public function update(Request $request, Expedient $expedient)
    {
        //
    }

    public function destroy(Expedient $expedient)
    {
        //
    }
}
