<?php

namespace App\Http\Controllers\Derivation;

use App\Models\Derivation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;

class DerivationUserController extends Controller
{
    public function index(Derivation $derivation) {
        $user = $derivation->user;
        return new UserResource($user);
    }
}
