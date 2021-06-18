<?php

namespace App\Http\Controllers\Derivation;

use App\Models\Derivation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\EmployeeResource;

class DerivationEmployeeController extends Controller
{
    public function index(Derivation $derivation){
        $employee = $derivation->employee;
        return new EmployeeResource($employee);
    }
}
