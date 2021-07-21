<?php

use Illuminate\Support\Facades\Route;
use App\Mail\TestEmailMailable;

// Route::get('/', function () {
//     return view('');
// });
// Route::get('/user/{user}',[UserController::class, 'show']);
Route::get('enviarEmail', function () {
    $correo = new TestEmailMailable();

    $emails = ['gatopbp123@gmail.com','lercc.en@gmail.com'];
    
    Mail::to($emails)->queue($correo);

    return 'email enviado!!!';
    // return view('emails.test');
});
