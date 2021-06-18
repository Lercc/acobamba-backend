<?php

namespace App\Http\Controllers\Expedient;

use App\Models\Expedient;
use App\Http\Controllers\Controller;
use App\Http\Resources\ExpedientResource;
use App\Http\Resources\ExpedientCollection;
use Illuminate\Http\Request;

class ExpedientController extends Controller
{
    public function index()
    {
        $expedients = Expedient::paginate(15);
        return new ExpedientCollection($expedients);
    }

    public function store(Request $request)
    {
        //
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
