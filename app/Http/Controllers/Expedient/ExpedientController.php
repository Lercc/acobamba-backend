<?php

namespace App\Http\Controllers\Expedient;

use App\Models\Expedient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\ExpedientRequest;
use App\Http\Resources\ExpedientResource;
use App\Http\Resources\ExpedientCollection;
use App\Http\Requests\ExpedientUpdateRequest;

class ExpedientController extends Controller
{
    public function index()
    {
        $expedients = Expedient::paginate(15);
        return new ExpedientCollection($expedients);
  
    }

    public function store(ExpedientRequest $request)
    {
          //codigo de expediente
          $id = DB::table('expedients as e')
          ->select(DB::raw('max(id) as id'))
          ->value('id');

                if ($id + 1  < 10) {
                    $code = 'MDA00000'.($id+1);
                }elseif ($id + 1 < 100) {
                    $code = 'MDA0000'.($id+1);
                }elseif ($id + 1 < 1000) {
                    $code = 'MDA000'.($id+1);
                }elseif ($id + 1 < 10000) {
                    $code = 'MDA00'.($id+1);
                }elseif ($id + 1 < 100000) {
                    $code = 'MDA0'.($id+1);
                }else {
                    $code = 'MDA'.($id+1);
                }

        $file = $request->file('file')->store('file/expedients', 'public');
        $expedient = Expedient::create($request->except('file')+[ 'file' => $file , 'code' =>$code]  );
        return new ExpedientResource($expedient);
        
    }

    public function show(Expedient $expedient)
    {
        return new ExpedientResource($expedient);
    }

    public function update(ExpedientUpdateRequest $request, Expedient $expedient)
    {
        // campos a actualizar 'status'
        $expedient->update($request->validated());
        return new ExpedientResource($expedient);
    }

    public function destroy(Expedient $expedient)
    {
        //
    }
}
