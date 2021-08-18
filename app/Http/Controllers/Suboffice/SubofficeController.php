<?php

namespace App\Http\Controllers\Suboffice;



use App\Models\Suboffice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SubofficeRequest;
use App\Http\Resources\SubofficeResource;
use App\Http\Resources\SubofficeCollection;
use App\Http\Requests\SubofficeUpdateRequest;

class SubofficeController extends Controller
{

    public function index()
    {
        $suboffices =  Suboffice::orderBy('id','desc')->paginate(8);
        return new SubofficeCollection($suboffices);
    }


    public function store( SubofficeRequest $request)
    {
        $suboffice = Suboffice::create($request->validated());
        return new SubofficeResource($suboffice);
    }


    public function show(Suboffice $suboffice)
    {
        return new SubofficeResource($suboffice);
    }


    public function update(SubofficeUpdateRequest $request, Suboffice $suboffice)
    {
        $suboffice->update($request->validated());
        return new SubofficeResource($suboffice);
    }


    public function destroy(Suboffice $suboffice)
    {
        //
    }
}
