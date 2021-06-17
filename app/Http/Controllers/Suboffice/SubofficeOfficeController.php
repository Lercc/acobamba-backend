<?php

namespace App\Http\Controllers\Suboffice;

use App\Models\Suboffice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubofficeOfficeController extends Controller
{
    public function index(Suboffice $suboffice){
        $offices = $suboffice->office->name;
        return $offices; 
    }
}
