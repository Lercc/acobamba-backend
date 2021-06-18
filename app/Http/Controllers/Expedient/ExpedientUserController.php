<?php

namespace App\Http\Controllers\Expedient;

use App\Models\Expedient;
use App\Http\Resources\UserResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExpedientUserController extends Controller
{
    public function index(Expedient $expedient) {
        $user = $expedient->user;
        return new UserResource($user);
    }
}
