<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\LoginReques;
use App\Models\User;

class LoginController extends Controller
{
    public function login(LoginRequest $request) {
        // verificar que el correo que se ingresa pertenece a un usuario registrado en la DB

        // if() {
            // Auth::attempt($request->only('email', 'password'))
            
        // } else {
        //     return response()->json([
        //         'message' => 'Credenciales incorrectas'
        //     ], 401)
        // }
        
        return 'estas logeado!';
    }
}
