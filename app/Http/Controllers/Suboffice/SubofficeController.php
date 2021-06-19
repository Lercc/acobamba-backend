<?php

namespace App\Http\Controllers\Suboffice;

use App\Models\Suboffice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SubofficeRequest;
use App\Http\Resources\SubofficeResource;
use App\Http\Resources\SubofficeCollection;

class SubofficeController extends Controller
{

    public function index()
    {
        $suboffices =  Suboffice::paginate(4);
        return new SubofficeCollection($suboffices);
    }


    public function store(SubofficeRequest $request)
    {
        //
    }


    public function show(Suboffice $suboffice)
    {
        return new SubofficeResource($suboffice);
    }


    public function update(Request $request, Suboffice $suboffice)
    {
        //
    }


    public function destroy(Suboffice $suboffice)
    {
        //
    }
}
