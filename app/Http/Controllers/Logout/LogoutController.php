<?php

namespace App\Http\Controllers\Logout;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\LogoutRequest;
use App\Models\User;

class LogoutController extends Controller
{
    public function logout(LogoutRequest $request) {
    
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Sesión terminada'
        ]);
    }
}
