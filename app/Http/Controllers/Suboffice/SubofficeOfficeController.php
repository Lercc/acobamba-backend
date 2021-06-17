<?php

namespace App\Http\Controllers\Suboffice;

use App\Models\Suboffice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\OfficeCollection;
use App\Http\Resources\OfficeResource;

class SubofficeOfficeController extends Controller
{
    public function index(Suboffice $suboffice){
        $office = $suboffice->office;
        return new OfficeResource($office); 
    }
}
