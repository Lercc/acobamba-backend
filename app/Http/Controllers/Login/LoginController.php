<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use App\Models\Employee;
use App\Models\Processor;

class LoginController extends Controller
{
    public function login(LoginRequest $request) {
        // verificar que el correo que se ingresa pertenece a un usuario registrado en la DB

        if(Auth::attempt([
            'email'=>$request->email,
            'password'=>$request->password ])){

            $user = $request->user();
            $employee = Employee::where('user_id', $user->id)->get();
            $processor = Processor::where('user_id', $user->id)->get();

            return [
                'message' => 'estas logeado!',
                'attributes' => [
                    'id'            => $user->id,
                    'role'          => $user->role->name,
                    'employee_id'   => sizeof($employee) != 0 ?  $employee[0]->id : null,
                    'employee_type' => sizeof($employee) != 0 ?  $employee[0]->employee_type : null,
                    'processor_id'  => sizeof($processor) != 0 ?  $processor[0]->id : null,
                    'name'          => $user->name,
                    'last_name'     => $user->last_name,
                    'email'         => $user->email,
                    'status'        => $user->status,
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
