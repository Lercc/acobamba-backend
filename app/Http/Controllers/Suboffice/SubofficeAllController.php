<?php

namespace App\Http\Controllers\Suboffice;

use App\Models\Suboffice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\SubofficeCollection;

class SubofficeAllController extends Controller
{
    public function getSubofficeAll()
    {
        $suboffices = Suboffice::get();
        return new SubofficeCollection($suboffices);
    }
}
