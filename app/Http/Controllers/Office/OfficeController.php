<?php

namespace App\Http\Controllers\Office;

use App\Models\Office;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\OfficeResource;
use App\Http\Resources\OfficeCollection;

class OfficeController extends Controller
{
   
    public function index()
    {
     $offices = Office::paginate(10);
     return new OfficeCollection($offices);
    }


    public function store(Request $request)
    {
        //
    }

   
    public function show(Office $office)
    {
        return new OfficeResource($office);
    }

 
    public function update(Request $request, Office $office)
    {
        //
    }

    public function destroy(Office $office)
    {
        //
    }
}
