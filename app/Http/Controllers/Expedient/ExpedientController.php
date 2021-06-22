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
        $file = $request->file('file')->store('file/expedients', 'public');
        $expedient = Expedient::create($request->except('file')+[ 'file' => $file ]);
        return new ExpedientResource($expedient);
        
    }

    public function show(Expedient $expedient)
    {
        return new ExpedientResource($expedient);
    }

    public function update(Request $request, Expedient $expedient)
    {
        // 
        // 'processor_id',
        // 'employee_id',
        // 'code',
        // 'document_type',
        // 'header',
        // 'subject', 
        // 'folios',
        // 'file',
        // 'status'


        // $expedient->update($request->except('file'));
        
        // if ($request->hasFile('file')) {
        //     // BORAR IMG ANTIGUA DEL STORAGE
        //     Storage::disk('public')->delete($expedient->file);

        //     //GUARDAR IMG NUEVA EN EL STORAGE
        //     $file = $request->file('file')->store('file/expedients', 'public');

        //     //ACTUALZIAR BD
        //     $expedient->file = $file;
        //     $voucher->update();
        // }
        // return new ExpedientResource($expedient);
    }

    public function destroy(Expedient $expedient)
    {
        //
    }
}
