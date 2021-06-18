<?php

namespace App\Http\Controllers\Archivation;

use App\Models\Archivation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ExpedientResource;

class ArchivationExpedientController extends Controller
{
    public function index(Archivation $archivation) {
        $expedient = $archivation->expedient;
        return new ExpedientResource($expedient);
    }
}
