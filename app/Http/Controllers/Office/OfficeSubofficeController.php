<?php

namespace App\Http\Controllers\Office;

use App\Models\Office;
use App\Models\Suboffice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\SubofficeCollection;

class OfficeSubofficeController extends Controller
{
    public function index(Office $office){
        // $suboffices = $office->suboffices;
        $suboffices = Suboffice::where('office_id',$office->id)->paginate(2);
        return new SubofficeCollection($suboffices);
    }
}
