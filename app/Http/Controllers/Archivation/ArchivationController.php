<?php

namespace App\Http\Controllers\Archivation;

use App\Models\Archivation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArchivationRequest;
use App\Http\Resources\ArchivationResource;
use App\Http\Resources\ArchivationCollection;

class ArchivationController extends Controller
{
  
    public function index()
    {
        $archivations = Archivation::paginate(15);
        return new ArchivationCollection($archivations);
    }

  
    public function store(ArchivationRequest $request)
    {
        //
    }

    public function show(Archivation $archivation)
    {
        return new ArchivationResource($archivation);
    }


    public function update(Request $request, Archivation $archivation)
    {
        //
    }

    public function destroy(Archivation $archivation)
    {
        //
    }
}
