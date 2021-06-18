<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Derivation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\DerivationCollection;

class UserDerivationController extends Controller
{
    public function index(User $user) {
        $derivations = Derivation::where('user_id', $user->id)->paginate(15);

        if (sizeof($derivations) != 0) {
            return new DerivationCollection($derivations);
        } else {
            return response()->json([
                'message' => 'El usuario no tiene derivaciones realizadas'
            ], 200);
        }
      
    }
}
