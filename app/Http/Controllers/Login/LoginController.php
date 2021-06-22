<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\LoginRequest;
use App\Models\User;

class LoginController extends Controller
{
    public function login(LoginRequest $request) {
        // verificar que el correo que se ingresa pertenece a un usuario registrado en la DB

        if(Auth::attempt([
            'email'=>$request->email,
            'password'=>$request->password ])){

            $user = $request->user();

            return [
                'message' => 'estas logeado!',
                'attributes' => [
                    'id'            => $user->id,
                    'name'          => $user->name,
                    'last_name'     => $user->last_name,
                    'email'         => $user->email,
                    'token'         => $user->createtoken($user->role->name)->plainTextToken,
                    // 'tokens'         => $user->tokens
                ]
            ];

        } else {
            return response()->json([
                'message' => 'Credenciales incorrectas'
            ], 401);
        }
    }
}
