<?php

namespace App\Http\Controllers\Expedient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Expedient;
use App\Http\Resources\ArchivationResource;

class ExpedientArchivationController extends Controller
{
    public function index(Expedient $expedient) {
        $archivation = $expedient->archivation;

        if ($archivation) {
            return new ArchivationResource($archivation);
        } else {
            return response()->json([
                'message' => 'El expediente no tiene archivaciones'
            ], 200);
        }

    }
}
