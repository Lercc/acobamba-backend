<?php

namespace App\Http\Controllers\Archivation;

use App\Models\Archivation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArchivationRequest;
use App\Http\Resources\ArchivationResource;
use App\Http\Resources\ArchivationCollection;
use App\Http\Requests\ArchivationUpdateRequest;

class ArchivationController extends Controller
{
  
    public function index()
    {
        $archivations = Archivation::paginate(15);
        return new ArchivationCollection($archivations);
    }

  //ArchivationRequest
    public function store(ArchivationRequest $request)
    {
        $archivation = Archivation::create($request->validated());
        return new ArchivationResource($archivation);
    }

    public function show(Archivation $archivation)
    {
        return new ArchivationResource($archivation);
    }

    public function update(ArchivationUpdateRequest $request, Archivation $archivation)
    {
        
        $archivation->update($request->validated());
        return new ArchivationResource($archivation);
    }

    public function destroy(Archivation $archivation)
    {
        $archivation->delete();
    }
}
