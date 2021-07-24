<?php

namespace App\Http\Controllers\Email;

use App\Http\Controllers\Controller;
use App\Mail\EmailPasswordRecoveryMailable;
use App\Models\Email;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\PasswordRecoveryRequest;

class EmailPasswordRecoveryController extends Controller
{
    // public function index()
    // {
    //     //
    // }

    public function store(PasswordRecoveryRequest $request)
    {
        $user = User::where('email', '=', $request->email)->get();
        $user = $user[0];

        // php maneja el formato UNIX en segundos
        // js maneja el formato UNIX en milisegundos
        // 1 segundo  === 1000 milisegundos
        $currentUnixTime = time();

        // crear el registro del email
        $user_id = $user->id;
        $type = 'password recovery';
        // sumar 600 segundos (5 minutos)
        // $expiration_at = ($currentUnixTime + 300) * 1000;
        $expiration_at = $currentUnixTime + 300;
        
        $email = Email::create([
            'user_id'       => $user_id,
            'type'          => $type,
            'expiration_at' => $expiration_at
        ]);

        // mandar el email al correo
        $correo = $user->email;
        Mail::to($correo)->queue(new EmailPasswordRecoveryMailable($email));
        
        return response()->json('correo de recuperación enviado!');

    }


    public function show(Email $email_password_recovery)
    {
        return $email_password_recovery;
    }

    // public function update(Request $request, Email $email)
    // {
    //     //
    // }

    // public function destroy(Email $email)
    // {
    //     //
    // }
}
