<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Derivation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ExpedientCollection;

class UserDerivationController extends Controller
{
    public function index(User $user) {
        $derivations = Derivation::where('user_id', $user->id)->paginate(15);
        return new ExpedientCollection($derivations);
      
    }
}
