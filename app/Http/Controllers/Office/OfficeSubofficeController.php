<?php

namespace App\Http\Controllers\Office;

use App\Models\Office;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OfficeSubofficeController extends Controller
{
    public function index(Office $office){
        $suboffices = $office->suboffices;
        return $suboffices;
   
    }
}
