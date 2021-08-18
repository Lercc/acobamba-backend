<?php

namespace App\Http\Controllers\Office;

use App\Models\Office;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\OfficeRequest;
use App\Http\Resources\OfficeResource;
use App\Http\Resources\OfficeCollection;
use App\Http\Requests\OfficeUpdateRequest;

class OfficeController extends Controller
{
   
    public function index()
    {
     $offices = Office::orderBy('id','desc')->paginate(8);
     return new OfficeCollection($offices);
    }


    public function store(OfficeRequest $request)
    {
   
        $office = Office::create($request->validated());
        $office->save();
        return new OfficeResource($office);
    }

   
    public function show(Office $office)
    {
        return new OfficeResource($office);
    }

 
    public function update(OfficeUpdateRequest $request, Office $office)
    {
        $office->update($request->validated());
        return new OfficeResource($office);
    }

    public function destroy(Office $office)
    {
        //
    }
}
