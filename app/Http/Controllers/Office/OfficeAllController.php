<?php

namespace App\Http\Controllers\Office;

use App\Models\Office;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\OfficeCollection;

class OfficeAllController extends Controller
{
    public function getOfficeAll()
    {
        $offices = Office::get();
        return new OfficeCollection($offices);
    }
}
